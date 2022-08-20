<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Flights
Route::get('/', function () {
    return Auth::viaRemember() ? view('flight.home') : view('flight.home');
});
Route::get('show', function() {
    return view('flight.show');
});

// Register
Route::get('register', function() {
    return view('user.create');
})->name('register') -> middleware('guest');
Route::post('register', [\App\Http\Controllers\UserController::class, 'store']);
//Route::resource('account', \App\Http\Controllers\UserController::class);

// Login
Route::get('login', function() {
    return view('user.index');
})->name('login') -> middleware('guest');
Route::post('login', [\App\Http\Controllers\UserController::class, 'login']);

// Logout
Route::post('logout', [\App\Http\Controllers\UserController::class, 'logout']) ->name('logout')-> middleware('auth');

// Profile
Route::get('profile', [\App\Http\Controllers\UserController::class, 'show'])->name('profile')->middleware(['auth', 'verified']);
Route::post('profile', [\App\Http\Controllers\UserController::class, 'edit']);

// Auth
Route::get('/email/verify', function() {
    return view('user.email.email-verification');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function(EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');	//signed is a middleware that checks if the user is signed in and has a valid signature

Route::post('/email/get-verification-link', [UserController::class, 'sendEmailVerificationNotification'])->middleware(['auth', 'throttle:6,1'])->name('verification.send');