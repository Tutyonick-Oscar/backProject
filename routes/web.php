<?php

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

Route::get('/',[viewsController::class,'questions'])->name('questions');
Route::get('/answer/{id}',[viewsController::class,'answer'])->name('answer');
Route::get('/ask',[viewsController::class,'ask'])->name('ask-question');
Route::get('/q-descriptions/{id}',[viewsController::class,'descriptions'])->name('descriptions');
Route::post('/ask',[viewsController::class,'send_question']);
Route::post('/answer/{id}',[viewsController::class,'send_answer']);
Route::post('/q-descriptions/{id}',[viewsController::class,'comments']);
