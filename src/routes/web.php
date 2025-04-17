<?php

use App\Http\Controllers\Auth\GoogleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layout.layout');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/login/google', [GoogleController::class, 'redirectToGoogle'])->name('login.google');
Route::get('/login/google/callback', [GoogleController::class, 'handleGoogleCallback']);
