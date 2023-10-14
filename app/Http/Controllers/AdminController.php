<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Requete;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Exists;

class AdminController extends Controller
{
    public function index()
    {
        //verification
        if(User::where('id',\Illuminate\Support\Facades\Auth::user()->id)->where('role','admin')->get()){
            $treservations =  Reservation::all();
            $sommeR = 0;
            $R = 0;
            foreach ($treservations as $r) {
                $R = $r->chambre->prix;
                $sommeR = $R + $sommeR;
            }
            dd(User::where('online', 1)->where('role','client')->get());

            return view('admin.index', [
                'users' => User::where('online', 1)->where('role','client')->get(),
                'tUsers' => User::where('status', 1)->where('role','client')->get(),
                'tComments' => Comment::all(),
                'nComments' => Comment::where('status', 0)->get(),
                'treservations' => Reservation::all(),
                'Areservation' => Reservation::where('status', 1)->get(),
                'sommeR' => $sommeR,
                'nrequetes' => Requete::where('status', 0)->get(),
                'trequetes' => Requete::all(),
            ]);
        }else{
            Auth::logout();
            return redirect()->route('admin.login');
        }


    }
}
