<?php

namespace App\Http\Controllers;

use App\Http\Requests\devInfosRequest;
use App\Models\question;
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
    
    public function profil ($userName, Request $request) {
        $founded = '';
        $user_id = 
        $users = User::withCount('questions')->get('id','name');
        foreach($users as $user){
            if($user->name == $userName ) {
                $founded = $user;
                $user_id = $user['id'];
            }
        }
        $found ='';
        if ($request->filled('search')) {
            $found =question::search($request->search)->get();
        }
        return view('Auth.profil',[
            'userInfos'=>$founded,
            'str'=>Str::class,
            'questions' => question::where('user_id','=',$user_id)->get(),
            'found'=>$found
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
    public function infos ($user, Request $request) {
        $found ='';
        if ($request->filled('search')) {
            $found =question::search($request->search)->get();
        }
        return view('Auth.infos',['found'=> $found]);
    }
    public function sendInfos ($user,devInfosRequest $request) {
        $user_id = Auth::user()->getAuthIdentifier();
        $user = User::find($user_id);
        $user->devInfos()->create($request->validated());
        if ( $user->devInfos->user_id !== null) {
            $user->devInfos()->update($request->validated());
        }
        return to_route('profil',Auth::user()->name);
    }
}
