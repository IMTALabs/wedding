<?php

namespace App\Http\Controllers\Admin\Guest;

use App\Http\Controllers\Controller;
use App\Models\Wedding;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index()
    {
        $wedding = Wedding::where('created_by', Auth::id())->first();
        if (!$wedding) {
            abort(404, 'Wedding not found');
        }

        return view('guest_manager.notification', [
            'layout' => 'guest_manager_layout',
            'title' => 'Thông báo',
        ]);
    }
}
