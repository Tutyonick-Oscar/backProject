<?php

namespace App\Http\Controllers;

use App\Http\Requests\loginRequest;
use Illuminate\Http\Request;
use App\Http\Requests\sinUpRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function profil () {
        return view('Auth.profil');
    }
    public function login () {
        return view('Auth.login');
    }
    public function signUp () {
        return view('Auth.sign_up');
    }
    public function signForm (sinUpRequest $request) {
        $user = $request->validated();
        $user['password'] = Hash::make($request->validated('password')) ;
        User::create($user);
        return to_route('questions');
    }
    public function loginForm (loginRequest $request) {
        $userInfos = $request->validated();
        if(Auth::attempt($userInfos)){
             $request->session()->regenerate();
             return redirect()->intended(route('questions'));
        }
        return to_route('login')->withErrors([
            'name' => "the name you enter doesn't match",
            'password' => "the password you enter doesn't match"
        ])->onlyInput('name');
    }
    public function logout () {
        Auth::logout();
        return to_route('login');
    }
}
