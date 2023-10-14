<?php

namespace App\Http\Controllers;

use DateTime;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Menage;
use DateTimeImmutable;
use App\Models\Chambre;
use App\Models\Comment;
use App\Models\Feature;
use App\Models\Requete;
use App\Models\Equipment;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;
use App\Http\Requests\UserRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use App\Http\Requests\CommentRequest;
use App\Http\Requests\RequeteRequest;
use App\Http\Requests\BookingFilterRequest;
use App\Mail\PropertyContactMail;
use App\Mail\PropertyRequestMail;
use App\Models\Category;
use Illuminate\Support\Facades\Mail;

class HotelController extends Controller
{
    // accueil
    public function index()
    {
        if (\Illuminate\Support\Facades\Auth::user() !== null) {
            $post = User::where('id', \Illuminate\Support\Facades\Auth::user()->id)->where('role', 'client')->update(['online' => 1]);
        }
        $books = Reservation::all();
        $menages = Menage::where('menage', 1)->get();
        $date = new Carbon();
        foreach ($books as $book) {
            if ($date->toDateString() === $book->dateDebut) {
                // $b =  $book->update(['status' => 0]);
                // foreach ($menages as $menage) {
                //     $menage->where('reservation_id',$book->id)->update(['etat'=> 0,'status'=>0]);
                // }
            }
        }


        $room1 = Chambre::where('category_id', 1)->where('status', 0)->limit(1)->get();
        $room2 = Chambre::where('category_id', 2)->where('status', 0)->limit(1)->get();
        $room3 = Chambre::where('category_id', 3)->where('status', 0)->limit(1)->get();
        $rooms = [$room1, $room2, $room3];
        $comments = Comment::where('status', 1)->distinct()->get();
        $emplois = User::where('role', 'emploi')->get();
        return view('hotel.home', compact('rooms', 'comments', 'emplois'));
    }
    //filter
    public function filter(BookingFilterRequest $request)
    {
        $post = $request->validated();
        $post['dateE'] = Carbon::parse($post['dateE'])->format('d-m-Y');
        $post['dateF'] = Carbon::parse($post['dateF'])->format('d-m-Y');
        //determiner la difference entre deux date
        $firstDate  = new DateTime($post['dateE']);
        $secondDate = new DateTime($post['dateF']);
        $intvl = $firstDate->diff($secondDate);

        // echo $intvl->y . " year, " . $intvl->m . " months and " . $intvl->d . " day";
        // echo "\n";
        // Total amount of days
        // echo $intvl->days . " days ";
        // dd();
        $Adulte = $post['Adulte'];
        $Enfant = $post['Enfant'];
        //verifier si les installation sont choisir
        if ($request->validated('feature') !== null) {
            $feature = implode(',', $request->validated('feature'));
        } else {
            $feature = null;
        }
        if ($feature !== null) {
            $filters = Chambre::where('adulte', $Adulte)->where('status', 0)->where('enfant', $Enfant)->where('feature', $feature)->get();
        } else {
            $filters = Chambre::where('adulte', $Adulte)->where('status', 0)->where('enfant', $Enfant)->get();
        }
        //verifier si les equipments sont choisir
        if ($request->validated('equipments') !== null) {
            $equipment = implode(',', $request->validated('equipments'));
        } else {
            $equipment = null;
        }
        if ($equipment !== null) {
            $filters = Chambre::where('adulte', $Adulte)->where('status', 0)->where('enfant', $Enfant)->where('equipments', $equipment)->get();
        } else {
            $filters = Chambre::where('adulte', $Adulte)->where('status', 0)->where('enfant', $Enfant)->get();
        }
        // verification si les equipement et les installation sont choisir
        if ($request->validated('feature') !== null and  $request->validated('equipments') !== null) {
            $feature = implode(',', $request->validated('feature'));
            $equipment = implode(',', $request->validated('equipments'));
        } else {
            $equipment = null;
            $feature = null;
        }
        //afficharge
        if ($equipment !== null and $feature !== null) {
            $filters = Chambre::where('adulte', $Adulte)->where('status', 0)->where('enfant', $Enfant)->where('feature', $feature)->where('equipments', $equipment)->get();
        }
        $equipments = Equipment::all();
        $features = Feature::all();
        return view('hotel.book', compact('post', 'filters', 'equipments', 'features','intvl'));
    }
    //register user
    public function store(UserRequest $request)
    {
        $password = $request->validated('password');
        $confirm = $request->validated('confirm_password');
        if ($password === $confirm) {
            $post = User::create($request->validated());
        }
        return response()->json($request->validated($post));
    }

    // à propos
    public function about()
    {
        $emplois = User::where('role', 'emploi')->get();
        return view('hotel.about', compact('emplois'));
    }
    //les services
    public function service()
    {
        $comments = Comment::where('status', 1)->distinct()->get();
        return view('hotel.service', compact('comments'));
    }
    // les chambres
    public function chambres()
    {
        $comments = Comment::where('status', 1)->distinct()->get();
        $rooms = Chambre::where('status', 0)->get();
        $equipments = Equipment::all();
        return view('hotel.chambres', compact('rooms', 'comments', 'equipments'));
    }
    // la chambre
    public function chambre($id)
    {
        $room = Chambre::where('status', 0)->find($id);
        $features = Feature::all();
        $comments = Comment::where('status', 1)->distinct()->get();
        $equipments = Equipment::all();
        return view('hotel.chambre', compact('room', 'features', 'equipments', 'comments'));
    }
    // contact
    public function comment()
    {
        return view('hotel.contact');
    }

    public function storeRequete(RequeteRequest $request)
    {
        $post = Requete::create($request->validated());
        $user = User::find($post['user_id']);
        Mail::send(new PropertyRequestMail($user,$request->validated()));
        return back()->with('success','Votre requette a bien ete soumit');
    }

    public function storeComment(CommentRequest $request)
    {
        $post = Comment::create($request->validated());
        return to_route('hotel');
    }
    // reservation
    public function booking()
    {
        $post = new Chambre();
        return view('hotel.reservation', compact('post'));
    }

    public function reserver(BookRequest $request,Reservation $posts)
    {
        $post = $request->validated();
        $post['code'] = uniqid();
        $post['valide'] = 'attente';
        $post['payer'] = 'non';
        $rooms = Chambre::find($post['chambre_id']);
        $catgs = Category::find($rooms->category_id);
        //verifions si l'utilisateur est connecter
        if ($post['user_id'] == 0) {
            // creation du compte client puis connexion automatique
            $date = new Date();
            $client = User::create([
                'name' => $post['name'],
                'email' => $post['email'],
                'password' => $post['name'],
                'lastname' => '',
                'adresse' => '',
                'phone' => '',
                'sexe' => '',
                'date' => '2023-09-28',
                'role' => 'client',
            ]);
            if (Auth::attempt(['name' => $post['name'], 'password' => $post['name']])) {
                // $post = User::where('id',\Illuminate\Support\Facades\Auth::user()->id)->update(['online' => 1]);
                $request->session()->regenerate();
                $home = $request->session()->regenerate();
                $user = User::find(\Illuminate\Support\Facades\Auth::user()->id);
                //reservation apres l'authentification
                $post['user_id'] = \Illuminate\Support\Facades\Auth::user()->id;
                $post['admin_id'] = \Illuminate\Support\Facades\Auth::user()->id;
                $post['dateDebut'] = Carbon::parse($post['dateDebut'])->format('Y-m-d');
                $post['dateFin'] = Carbon::parse($post['dateFin'])->format('Y-m-d');
                $p =  $posts->create($post);
                Mail::send(new PropertyContactMail($catgs,$rooms,$user,$post));
                // $room = Chambre::where('id', $post['chambre_id'])->update([
                //     'status' => 1,
                // ]);
                // Menage::create(['reservation_id' => $p->id]);
                /// redirection apres la connexion et la reservation
                if (\Illuminate\Support\Facades\Auth::user()->role === 'client') {
                    User::where('id', \Illuminate\Support\Facades\Auth::user()->id)->where('role', 'client')->update(['online' => 1]);
                    return redirect()->route('hotel');
                }


            }
        } else {
            $post['dateDebut'] = Carbon::parse($post['dateDebut'])->format('Y-m-d');
            $post['dateFin'] = Carbon::parse($post['dateFin'])->format('Y-m-d');
            $post['admin_id'] = \Illuminate\Support\Facades\Auth::user()->id;
            $p =  $posts->create($post);
            // $room = Chambre::where('id', $post['chambre_id'])->update([
            //     'status' => 1,
            // ]);
            $user = User::find($post['user_id']);
            Mail::send(new PropertyContactMail($catgs,$rooms,$user,$post));

            // dd(Chambre::where('id', $post['chambre_id'])->get());


            // Menage::create(['reservation_id' => $p->id]);
        }

        return to_route('hotel');
    }

    public function bookOne($id)
    {
        $post = Chambre::find($id);
        return view('hotel.reservation', compact('post'));
    }
    // team
    public function team()
    {
        $users = User::emploi()->recent()->get();
        return view('hotel.team', compact('users'));
    }
    //temoin
    public function temoin()
    {
        $comments = Comment::where('status', 1)->distinct()->get();
        return view('hotel.temoin', compact('comments'));
    }
}
