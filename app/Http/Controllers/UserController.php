<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use GuzzleHttp\Psr7\UploadedFile;
use App\Http\Requests\UserRequest;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\AddImageRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.users.index', [
            'users' => User::where('status',1)->get()
        ]);
    }
    public function addImage($id)
    {
        $post = User::find($id);
        return view('admin.users.addimage',compact('post'));
    }

    public function postImage(AddImageRequest $request,$id,User $post)
    {
        $user = User::find($id);
       $add = $request->validated();
        /** @var UploadedFile $image */
        $image =$request->validated('avatar');
        if($user->avatar){
            Storage::disk('public')->delete($user->avatar);
        }
        $add['avatar'] = $image->store('blog','public');
        $post->where('id',$id)->update($add);
        return to_route('users');
    }

    public function storeUser(UserRequest $request)
    {
        $password = $request->validated('password');
        $confirm = $request->validated('confirm_password');
        if ($password === $confirm) {
            $post = User::create($request->validated());
        }
        return response()->json($request->validated($post));
    }
    public function edit($id)
    {
        $post = User::findOrFail($id);
        return response()->json($post);
    }
    public function edite(UpdateUserRequest $request,$id,User $post)
    {
        $add = $request->validated('password');
        if(strlen($add) > 0)
        {
            $post['password'] = $add;
            $post->where('id',$id)->update($request->validated());
        }else{
            $post->where('id',$id)->update($request->validated());
        }
        return response()->json($post);
    }
    public function active($id)
    {
        $post = User::find($id);
        if ($post->status == 0) {
            $post->where('id', $id)->update(['status' => 1]);
        } else {
            $post->where('id', $id)->update(['status' => 0]);
        }
        return response()->json($post);
    }
}
