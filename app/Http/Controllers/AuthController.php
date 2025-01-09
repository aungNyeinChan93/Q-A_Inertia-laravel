<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //register
    public function register(){
        return Inertia::render('Auth/Register');
    }

    // store
    public function store(Request $request){
            $fields = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string|min:8',
        ]);

        $user = User::create($fields);

        Auth::login($user);

        return to_route('home');
    }



    //loign
    public function login(){
        return Inertia::render('Auth/Login');
    }

    // loginStore
    public function loginStore(Request $request){
        $fields = $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ]);

        if(!auth()->attempt($fields)){
            return back()->withErrors([
                'email'=> 'your crendential wrong!'
            ])->onlyInput('email');
        }

        return to_route("home")->with('message','login success');
    }

    // logout
    public function logout(){
        Auth::logout();
        return to_route('login');
    }


}
