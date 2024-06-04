<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{


    public function index(){
        return view('authentication');
    }

    public function register(Request $request){
        $userFields = $request->validate([
            "name" => ['required', 'min:3', Rule::unique('users','name')],
            "email" => ['required', Rule::unique('users','email')],
            "password" => ['required', 'min:6', 'confirmed'],
        ]);

        $userFields['password'] = bcrypt($userFields['password']);
        $user = User::create($userFields);
        auth()->login($user);

        return redirect('/');
    }

    public function login(Request $request){
        $userFields = $request->validate([
            "login-email" => ['required'],
            "login-password" => ['required'],
        ]);

        if(auth()->attempt(['email' => $userFields['login-email'], 'password' => $userFields['login-password']])){
            $request->session()->regenerate();
        }

        return redirect('/');
    }

    public function logout(){
        auth()->logout();
        return redirect('/');
    }
}
