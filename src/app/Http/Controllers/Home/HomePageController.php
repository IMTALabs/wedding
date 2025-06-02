<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index() {
        return view('ovation-home.home');
    }

    public function register(Request $request) {

    }
}
