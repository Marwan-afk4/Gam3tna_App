<?php

use App\Http\Controllers\Admin\CollegeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/',[LoginController::class,'showLoginForm'])->name('login');

Route::post('/', [LoginController::class, 'login']);

Route::get('/signup', [LoginController::class, 'showSignupForm'])->name('signup.form');

Route::post('/signup', [LoginController::class, 'signup'])->name('signup');

Route::get('/api/colleges/{universityId}', [LoginController::class, 'getColleges']);

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard',[DashboardController::class,'dashboard'])->name('admin.dashboard');

    Route::post('/admin/universities/store', [DashboardController::class, 'addUniversty'])->name('admin.universities.store');

    Route::delete('/admin/universities/{id}', [DashboardController::class, 'destroy'])->name('admin.universities.destroy');

    // Show university dashboard with colleges
    Route::get('/admin/universities/{id}/dashboard', [CollegeController::class, 'dashboard'])->name('admin.university_dashboard');

    // Add a new college
    Route::post('/admin/universities/{id}/add-college', [CollegeController::class, 'addCollage'])->name('admin.colleges.add');

    // Delete a college
    Route::delete('/admin/universities/{universityId}/colleges/{id}', [CollegeController::class, 'destroy'])->name('admin.colleges.destroy');

});

Route::middleware(['auth'])->get('/user/profile', [UserController::class, 'profile'])->name('user.profile');
// Contact Us
Route::get('/contact-us', function () {
    return view('user.contact');
})->name('contact');
// submit contact
Route::post('/contact-us', function () {
    return redirect()->route('contact')->with('success', 'Message sent successfully!');
})->name('contact.submit');


Route::post('/contact-us', [UserController::class, 'submit'])->name('contact.submit');




