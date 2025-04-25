<?php

use App\Http\Controllers\Admin\Guest\DashboardController;
use App\Http\Controllers\Auth\GoogleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layout.layout');
})->name('demo');
Route::get('/guest_admin', [DashboardController::class, 'index'])->name('guest_admin');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');
Route::post('/logout', [GoogleController::class, 'logout'])->name('logout');

Route::get('/login/google', [GoogleController::class, 'redirectToGoogle'])->middleware('guest')->name('login.google');
Route::get('/login/google/callback', [GoogleController::class, 'handleGoogleCallback'])->middleware('guest');

//Guest_admin
Route::group([
    'prefix' => 'guest_admin',
    'as' => 'guest_admin.',
    'middleware' => 'auth'
], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/groom_bride', [\App\Http\Controllers\Admin\Guest\WeddingController::class, 'index'])->name('groom_bride');
});
