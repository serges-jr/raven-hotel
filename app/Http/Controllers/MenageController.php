<?php

namespace App\Http\Controllers;

use App\Models\Chambre;
use App\Models\Menage;
use App\Models\Reservation;
use Illuminate\Http\Request;

class MenageController extends Controller
{
    public function index()
    {
        $posts = Menage::where('menage', 1)->get();
        return view('admin.menage.index', compact('posts'));
    }
    public function store($id)
    {
        $post = Menage::find($id);
        $chambre = Chambre::find($post->reservation->chambre->id);
        $tab= [$post,$chambre];
        if ($post->etat == 0) {
            Menage::where('id',$id)->update(['menage'=> 0]);
            $chambre->update(['status' => 0]);
            return response()->json($tab);
        }
        return response()->json($tab);
    }
}
