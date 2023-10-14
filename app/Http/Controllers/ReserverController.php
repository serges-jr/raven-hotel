<?php

namespace App\Http\Controllers;

use DateTime;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Menage;
use App\Models\Chambre;
use App\Models\Category;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Mail\PropertyContactMail;
use App\Mail\AdminReservationMail;
use PhpParser\Node\Expr\Cast\Int_;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\AdminBookingRequest;
use App\Mail\ClientContactMail;

class ReserverController extends Controller
{
    public function index()
    {
        $posts = Reservation::where('valide', 'valider')->where('payer', 'payer')->get();
        $post = Reservation::where('valide', 'attente')->get();
        $books = Reservation::where('payer', 'non')->where('valide', 'valider')->get();
        $users = User::all();
        return view('admin.reserver.index', compact('posts', 'users', 'post', 'books'));
    }
    public function add()
    {
        $posts = Chambre::status()->get();
        return view('admin.reserver.addReservation', compact('posts'));
    }
    public function addBooking(AdminBookingRequest $request)
    {
        $post = $request->validated();
        $post['code'] = uniqid();
        $rooms = Chambre::findOrFail($post['chambre_id']);
        $catgs = Category::findOrFail($rooms->category_id);
        User::create([
            'name' => $post['name'],
            'email' => $post['email'],
            'password' => $post['name'],
            'lastname' => $post['lastname'],
            'adresse' => $post['adresse'],
            'phone' => $post['phone'],
            'sexe' => $post['sexe'],
        ]);
        $user = User::where('email', $post['email'])->get();
        $p = Reservation::create([
            'dateDebut' => $post['dateDebut'],
            'dateFin' => $post['dateFin'],
            'user_id' => $user[0]['id'],
            'chambre_id' => $post['chambre_id'],
            'montant' => $post['montant'],
            'nbjour' => $post['nbjour'],
            'admin_id' => $post['admin_id'],
            'code' => $post['code'],
        ]);
        Menage::create(['reservation_id' => $p->id]);
        $chambres = Chambre::where('id', $post['chambre_id'])->update([
            'status' => 1,
        ]);
        $users = User::findOrFail($user[0]['id']);
        Mail::send(new AdminReservationMail($catgs, $rooms, $users, $post));
        return redirect()->route('reserver')->with('success', 'reservation effectuer avec success');
    }
    public function addRoom($id)
    {
        $post = Chambre::findOrFail($id);
        return response()->json($post);
    }


    // valider reservation
    public function valider($id)
    {
        $post = Reservation::where('id', $id)->update(['valide' => 'valider']);
        $data = Reservation::find($id);
        $user = User::find($data->user_id);
        Mail::send(new ClientContactMail($user, $data));
        return response()->json($post);
    }
    // ///
    public function infoBook($id)
    {
        $post = Reservation::findOrFail($id);
        $post['nameUser'] = $post->user->name . ' ' . $post->user->lastname;
        return response()->json($post);
    }
    public function store($id, $user)
    {
        $room = Chambre::findOrFail($id);
        $client = User::findOrFail($user);
        $post = Reservation::create([
            'user_id' => $client->id,
            'chambre_id' => $room->id
        ]);
        return response()->json($post);
    }

    //recherche
    public function search(Request $request)
    {
        $code = $request->input('code');
        $book1 = Reservation::where('code', $code)->get();
        $book = Reservation::find($book1[0]['id']);
        $user = User::find($book->user_id);
        $book['user_name'] = $user->name;
        $book['user_lastname'] = $user->lastname;
        $book['user_phone'] = $user->phone;
        $book['user_email'] = $user->email;
        $book['room_name'] = $book->chambre->category->name;
        $book['room_numero'] = $book->chambre->numero;
        $book['room_status'] = $book->chambre->status;
        return response()->json($book);
    }

    //payer
    public function payer($id)
    {
        $book = Reservation::where('id', $id)->update(['payer' => 'payer']);
        $book1 = Reservation::find($id);
        $room = Chambre::where('id', $book1->chambre->id)->update([
            'status' => 1,
        ]);
        Menage::create(['reservation_id' => $book1->id]);
        User::where('id',$book1->user->id)->update(['online' => 1]);
        return response()->json($book);
    }
}
