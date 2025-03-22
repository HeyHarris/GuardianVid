<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;



//Sign Up Routes *******************************************************************

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/register', function () {
    return view('home');
})->name('register');


Route::post('/register', [UserController::class, 'registerPost'])
->name("register.post");


//Login Routes *******************************************************************
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', [UserController::class, 'loginPost'])
->name("login.post");

//Main Page Routes *******************************************************************
Route::get('/mainpage', function () {
    return view('mainpage');
})->name('mainpage');

Route::post('/mainpage', [UserController::class, 'logoutPost'])
->name("logout.post");