<?php

use App\Http\Controllers\Admin\Guest\DashboardController;
use App\Http\Controllers\Admin\Guest\WeddingLocationController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Middleware\RegisteredWeddingMiddleware;
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
    'middleware' => ['auth', RegisteredWeddingMiddleware::class]
], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/groom_bride', [\App\Http\Controllers\Admin\Guest\WeddingController::class, 'index'])->name('groom_bride');

    //settings
    Route::get('/settings', [\App\Http\Controllers\Admin\Guest\SettingController::class, 'index'])->name('settings');

    //envents
    Route::get('/events', [\App\Http\Controllers\Admin\Guest\EventController::class, 'index'])->name('events');

    Route::group(
        [
            'prefix' => 'album',
            'as' => 'album.',
        ],
        function () {
            Route::get('/', [\App\Http\Controllers\Admin\Guest\AlbumController::class, 'index'])->name('index');
            Route::get('/create', [\App\Http\Controllers\Admin\Guest\AlbumController::class, 'create'])->name('create');
        }
    );

    Route::group(
        [
            'prefix' => 'love_story',
            'as' => 'love_story.',
        ],
        function () {
            Route::get('/', [\App\Http\Controllers\Admin\Guest\LoveStoryController::class, 'index'])->name('index');
        }
    );

    Route::get('/wedding-location', [WeddingLocationController::class, 'index'])->name('wedding_location.index');
    Route::get('/notification', [\App\Http\Controllers\Admin\Guest\NotificationController::class, 'index'])->name('notification.index');
});

Route::get('/home', [\App\Http\Controllers\Home\HomePageController::class, 'index'])->name('home.home-page');
Route::post('/home/register', [\App\Http\Controllers\Home\HomePageController::class, 'register'])->middleware('auth')->name('home.register');

Route::get('/wedding/{sub_domain}', [\App\Http\Controllers\Wedding\TheWeddingController::class, 'index']);
