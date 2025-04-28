<?php

namespace App\Http\Controllers\Admin\Guest;

use App\Http\Controllers\Admin\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WeddingController extends BaseController
{
    public function index()
    {
        return view('guest_manager.wedding_form');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
    }
}
