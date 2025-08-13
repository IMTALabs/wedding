<?php

namespace App\Http\Controllers\Admin\Guest;

use App\Http\Controllers\Admin\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WeddingController extends BaseController
{
    protected $title = 'Cô dâu & Chú rể';

    public function index()
    {
        return view('guest_manager.wedding_form');
    }
}
