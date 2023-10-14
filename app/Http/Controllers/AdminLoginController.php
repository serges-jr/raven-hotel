<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AdminLoginRequest;
use App\Models\User;

class AdminLoginController extends Controller
{
    public function login(){
        return view('admin.login.admin');
    }
    public function tologin(AdminLoginRequest $request){

        $login = $request->validated();
        if(Auth::attempt($login))
        {
            $request->session()->regenerate();

            if(User::where('id',\Illuminate\Support\Facades\Auth::user()->id)->where('role','admin')->get()){
                return redirect()->intended(route('dashboard'));
            }else{
                Auth::logout();
                return redirect()->intended(route('admin.login'));
            }
        }
        return to_route('admin.login')->withErrors([
            'speudo' => 'speudo invalide',
            'password' => 'mot de passe incorrect'
        ])->onlyInput('speudo');
    }
}
