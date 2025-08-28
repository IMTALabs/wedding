<?php

namespace App\Http\Controllers\Admin\Guest;

use App\Http\Controllers\Admin\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GiftBoxController extends BaseController
{
    public function index(){
        return view('guest_manager.gift_box');
    }
}
