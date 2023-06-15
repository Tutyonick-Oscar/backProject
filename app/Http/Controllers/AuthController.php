<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\sinUpRequest;
use App\Models\User;
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
}
