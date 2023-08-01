<?php

namespace App\Http\Controllers;

use Storage;
use Validator;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\loginRequest;
use App\Http\Requests\sinUpRequest;
use App\Http\Requests\profilRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    
    public function profil ($userName) {
        $found = '';
        $users = User::all('id','name');
        foreach($users as $user){
            if($user->name == $userName ) {
                $found = $user;
            }
        }
        return view('Auth.profil',[
            'userInfos'=>$found,
            'str'=>Str::class,
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
        if($user->photo->photo!==null){
           $user->photo()->update($photo);           
        }  
        
       
        return to_route('profil',Auth::user()->name);
    }
    public function infos ($user) {
        return view('Auth.infos');
    }
}
