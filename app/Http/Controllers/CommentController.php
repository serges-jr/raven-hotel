<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        return view('admin.comment.index', [
            'comments' => Comment::all()
        ]);
    }
    public function edit($id)
    {
        $post = Comment::findOrFail($id);
        return response()->json($post);
    }
    public function edite(CommentRequest $request,$id)
    {
        $post = Comment::where('id',$id)->update($request->validated());
        return response()->json($post);
    }

    public function active($id)
    {
        $post = Comment::find($id);
        if($post->status == 0)
        {
            $post->where('id',$id)->update(['status' => 1]);
        }else{
            $post->where('id',$id)->update(['status' => 0]);
        }
        return response()->json($post);
    }
}
