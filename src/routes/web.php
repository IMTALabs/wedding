<?php

use App\Http\Controllers\Admin\Guest\DashboardController;
use App\Http\Controllers\Auth\GoogleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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
    Route::post('/groom_bride/post', [\App\Http\Controllers\Admin\Guest\WeddingController::class, 'store'])->name('groom_bride.store');

    //settings
    Route::get('/settings', [\App\Http\Controllers\Admin\Guest\SettingController::class, 'index'])->name('settings');

    //envents
    Route::get('/events', [\App\Http\Controllers\Admin\Guest\EventController::class, 'index'])->name('events');
});

Route::get('/home', [\App\Http\Controllers\Home\HomePageController::class, 'index'])->name('home.home-page');;


