<?php

namespace App\Http\Controllers\Admin\Guest;

use App\Http\Controllers\Admin\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends BaseController
{
    public function index() {
        $this->setTitle('Bảng điều khiển');

        return view('guest_manager.dashboard');
    }
}
