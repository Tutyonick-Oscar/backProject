<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\viewsController;
use Illuminate\Routing\ViewController;
use Illuminate\Support\Facades\Route;
// use Illuminate\Routing\Route

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[viewsController::class,'questions'])->name('questions')->middleware('auth');
Route::get('/answer/{id}',[viewsController::class,'answer'])->name('answer');
Route::get('/ask',[viewsController::class,'ask'])->name('ask-question')->middleware('auth');
Route::get('/q-descriptions/{id}',[viewsController::class,'descriptions'])->name('descriptions')->middleware('auth');
Route::post('/ask',[viewsController::class,'send_question']);
Route::post('/answer/{id}',[viewsController::class,'send_answer']);
Route::post('/q-descriptions/{id}',[viewsController::class,'comments'])->middleware('auth');
Route::get('/login',[AuthController::class,'login'])->name('login');
Route::get('/sign_up',[AuthController::class,'signUp'])->name('sign-up');
Route::post('/sign_up',[AuthController::class,'signForm']);
Route::post('/login',[AuthController::class,'loginForm']);
Route::delete('/logout',[AuthController::class,'logout'])->name('logout');
Route::get('/profil',[AuthController::class,'profil'])->name('profil')->middleware('auth');
Route::post('/profil',[AuthController::class,'sendProfil']);



