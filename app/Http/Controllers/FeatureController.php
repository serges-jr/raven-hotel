<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeatureRequest;
use App\Models\Feature;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    public function index()
    {
        return view('admin.feature.index',[
            'feature' => new Feature(),
            'features' => Feature::all()
        ]);
    }
    public function store(FeatureRequest $request)
    {
        $post = Feature::Create($request->validated());
        return response()->json($post);
    }
    public function edit($id)
    {
        $post = Feature::find($id);
        if($post->status == 0)
        {
            $post->where('id',$id)->update(['status' => 1]);
        }else{
            $post->where('id',$id)->update(['status' => 0]);
        }
        return redirect()->route('feature');
    }
}
