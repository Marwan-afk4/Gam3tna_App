<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/login',[LoginController::class,'showLoginForm'])->name('login');

Route::post('/login', [LoginController::class, 'login']);

Route::get('/signup', [LoginController::class, 'showSignupForm'])->name('signup.form');

Route::post('/signup', [LoginController::class, 'signup'])->name('signup');

Route::get('/api/colleges/{universityId}', [LoginController::class, 'getColleges']);

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
