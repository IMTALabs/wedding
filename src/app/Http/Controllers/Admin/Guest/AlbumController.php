<?php

namespace App\Http\Controllers\Admin\Guest;

use App\Http\Controllers\Admin\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AlbumController extends BaseController
{
    public function index() {
        return view('guest_manager.album.index');
    }

    public function create()
    {
        return view('guest_manager.album.create');
    }
}
