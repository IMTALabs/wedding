<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterWeddingRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomePageController extends Controller
{
    public function index() {
        $is_registered = Auth::check() && Auth::user()->weddings->count() > 0;
        return view('ovation-home.home', compact('is_registered'));
    }

    public function register(RegisterWeddingRequest $request) {
//        dd($request->validated());;
        $user = Auth::user();
        if($user->weddings->count() > 1) {
            return redirect()->back()->flash('error', 'You have!');
        }

        $user->weddings()->create($request->validated());

        return redirect()->route('guest_admin.dashboard')->with('success', 'Wedding created successfully!');
    }
}
