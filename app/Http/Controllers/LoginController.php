<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Routing\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\EditProfilRequest;
use App\Http\Requests\EditPasswordRequest;

class LoginController extends Controller
{
    //sign
    public function sign()
    {
        return view('hotel.sign');
    }
    //Login
    public function login()
    {
        return view('hotel.login');
    }
    public function tologin(LoginRequest $request)
    {

        $login = $request->validated();
        if (Auth::attempt($login)) {
            // $post = User::where('id',\Illuminate\Support\Facades\Auth::user()->id)->update(['online' => 1]);
            $request->session()->regenerate();
            $home = $request->session()->regenerate();
            $user = User::where('id', \Illuminate\Support\Facades\Auth::user()->id)->where('status', 1)->get();
            $status = User::where('id', \Illuminate\Support\Facades\Auth::user()->id)->where('status', 0)->get();
            if (\Illuminate\Support\Facades\Auth::user()->status !== 0) {
                if (\Illuminate\Support\Facades\Auth::user()->role === 'admin') {
                    return redirect()->route('dashboard');
                }
                if (\Illuminate\Support\Facades\Auth::user()->role === 'client') {
                    return redirect()->route('hotel');
                }
            }
            $post = User::where('id', \Illuminate\Support\Facades\Auth::user()->id)->update(['online' => 0]);
            Auth::logout();
            return redirect('/Login')->with('status', 'veuillez vous enregistrer a nouveau votre compte a ete suprimer');
        }
        return to_route('login')->withErrors([
            'name' => 'name invalide',
            'password' => 'mot de passe incorrect'
        ])->onlyInput('name');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function supprimer()
    {
        $post = User::where('id', \Illuminate\Support\Facades\Auth::user()->id)->update(['status' => 0]);
        Auth::logout();
        return to_route('hotel');
    }

    public function profile()
    {
        $reservations = Reservation::where('user_id',\Illuminate\Support\Facades\Auth::user()->id)->where('valide','valider')->get();
        return view('hotel.profileUser', compact('reservations'));
    }

    public function editProfile($id, EditProfilRequest $request)
    {
        User::where('id', $id)->update($request->validated());
        return to_route('profile')->with('status', 'profile modifier avec success');
    }

    public function editpassword($id, EditPasswordRequest $request)
    {
        $current = $request->validated('current');
        $new = $request->validated('new');
        $confirm = $request->validated('confirm');
        $post = User::find($id);
        $password = $post->password;
        if ($password === $current) {
            if ($new === $confirm) {
                User::where('id', $id)->update(['password' => $confirm]);
            }
        }
        return to_route('profile')->with('status', 'mot de passe modifier avec success');
    }
    // create user

    public function store(UserRequest $request, User $add)
    {
        $password = $request->validated('password');
        $confirm = $request->validated('confirm_password');
        if ($password === $confirm) {
            $post = $request->validated();
            /** @var UploadedFile $image */
            $image = $request->validated('avatar');
            $post['avatar'] = $image->store('bloc', 'public');

            $add->create($post);


            return redirect('Login')->with([
                'status' => 'compte creer avec success',
                'name' => $request->input('name'),
                'password' => $request->input('password')
            ]);
        }
    }
}
