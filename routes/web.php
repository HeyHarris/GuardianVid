<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\VideoFeedController;
use App\Http\Controllers\ModerationController;



//Sign Up Routes *******************************************************************

Route::get('/', function () {
    if(Auth::check()) {
        return redirect()->route('mainpage');
        }
        return view('home');
})->name('home');

Route::post('/register', [UserController::class, 'registerPost'])
->name("register.post");


//Login Routes *******************************************************************
Route::get('/login', function () {
    if(Auth::check()) {
    return redirect()->route('mainpage');
    }
    return view('login');
})->name('login');

Route::post('/login', [UserController::class, 'loginPost'])
->name("login.post");

//Main Page Routes *******************************************************************

Route::middleware('auth')->group(function () {
    Route::get('/mainpage', [VideoFeedController::class, 'getVideoFeed'])->name('mainpage');
    Route::post('/mainpage', [UserController::class, 'logoutPost'])->name("logout.post");
});

//Upload Page Routes *******************************************************************

Route::middleware('auth')->group(function () {
    Route::get('/upload', function () {
        return view('upload');
    })->name('upload');
    Route::post('/upload', [UploadController::class, 'uploadVideo'])->name("upload.post");
});

//Moderation Queue *******************************************************************

Route::middleware('auth')->group(function () {
    Route::get('/moderation', [ModerationController::class, 'getModerationVideoFeed'])->name('moderation');
    Route::post('/moderation/{video}/approve', [ModerationController::class, 'approve'])->name('moderation.approve');
    Route::post('/moderation/{video}/reject', [ModerationController::class, 'reject'])->name('moderation.reject');
});