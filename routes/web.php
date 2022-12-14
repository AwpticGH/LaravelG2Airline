<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\PasswordResetController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\Auth\Socialite\GoogleController;
use App\Http\Controllers\Auth\Socialite\GoogleUserController;

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
Route::get('/', 'App\Http\Controllers\FlightController@create');
Route::get('show', [FlightController::class, 'show'])->name('flight.show');

// Reservations
Route::get('/reservation', 'App\Http\Controllers\ReservationController@create')->name('reservation.create');
Route::post('/reservation', 'App\Http\Controllers\ReservationController@store')->name('reservation.store');
Route::get('/reservation/get', 'App\Http\Controllers\ReservationController@show')->name('reservation.show');

// Register
Route::get('register', function() {
    return view('user.create');
})->name('register') -> middleware('guest');
Route::post('register', [\App\Http\Controllers\UserController::class, 'store']);
//Route::resource('account', \App\Http\Controllers\UserController::class);

// Login
Route::get('login', [UserController::class, 'index'])->name('login')->middleware('guest');
Route::post('login', [\App\Http\Controllers\UserController::class, 'login']);

// Logout
Route::post('logout', [\App\Http\Controllers\UserController::class, 'logout']) ->name('logout')-> middleware('auth');

// Profile
Route::get('profile', [\App\Http\Controllers\UserController::class, 'show'])->name('profile')->middleware(['auth', 'verified']);
Route::post('profile', [\App\Http\Controllers\UserController::class, 'edit'])->name('profile');

// Email Verification
Route::get('/email/verify', function() {
        return view('user.email.email-verification');
    })->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', [UserController::class, 'verifyEmail'])->middleware(['auth', 'signed'])
        ->name('verification.verify');	//signed is a middleware that checks if the user is signed in and has a valid signature

Route::post('/email/get-verification-link', [UserController::class, 'sendEmailVerificationNotification'])
        ->middleware(['auth', 'throttle:6,1'])->name('verification.send');

// Password Reset
// Link
Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request')->middleware('guest');
Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
// Reset
Route::get('reset-password/{token}', [PasswordResetController::class, 'create'])->name('password.reset');
Route::post('reset-password', [PasswordResetController::class, 'store'])->name('password.update');

// Socialite
Route::get('login/google/redirect', [GoogleController::class, 'create'])->name('google.redirect')->middleware('guest');
Route::get('login/google/callback', [GoogleController::class, 'store'])->name('google.callback')->middleware('guest');
Route::get('login/google/profile-completion', [GoogleUserController::class, 'create'])->name('google.profile')->middleware(['auth', 'incomplete.profile']);
Route::post('login/google/profile-completion', [GoogleUserController::class, 'edit'])->name('google.profile.update');
