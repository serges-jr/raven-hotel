<?php

namespace App\Http\Controllers;

use App\Models\Requete;
use Illuminate\Http\Request;

class RequeteController extends Controller
{
    public function index()
    {
        $posts = Requete::all();
        foreach($posts as $post){
            $post->update(['status' => 1]);
        }
        return view('admin.requete.index', [
            'requetes' => Requete::latest()->get()
        ]);
    }


    public function active($id)
    {
        $post = Requete::find($id);
        if($post->status == 0)
        {
            $post->where('id',$id)->update(['status' => 1]);
        }else{
            $post->where('id',$id)->update(['status' => 0]);
        }
        return response()->json($post);
    }
}
