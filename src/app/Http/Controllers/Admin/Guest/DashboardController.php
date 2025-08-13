<?php

namespace App\Http\Controllers\Admin\Guest;

use App\Http\Controllers\Admin\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Wedding;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends BaseController
{
    public function index() {
        $this->setTitle('Bảng điều khiển');

        $wedding = Wedding::where('created_by', Auth::id())->first();

        return view('guest_manager.dashboard', compact('wedding'));
    }
}
