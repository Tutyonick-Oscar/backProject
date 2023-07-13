<?php

namespace App\Http\Controllers;

use App\Http\Requests\profilRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\loginRequest;
use App\Http\Requests\sinUpRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Storage;
use Validator;

class AuthController extends Controller
{
    public function profil () {
        return view('Auth.profil',[
            'profil' =>Storage::url(User::findOrFail(Auth::user()->getAuthIdentifier())->photo->photo)
        ]);
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
        $authUser = User::create($user);
        Auth::login($authUser);
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
    public function sendProfil (profilRequest $request) {
        $user_id = Auth::user()->getAuthIdentifier();
        $user = User::find($user_id); 
        $photo = $request->validated();
        if ($request->validated('photo')!== null && !$request->validated('photo')->getError()){
            $photo['photo'] = $request->validated('photo')->store('profil','public');
        }
        $user->photo()->create($photo);
       
        return to_route('profil');
    }
}
