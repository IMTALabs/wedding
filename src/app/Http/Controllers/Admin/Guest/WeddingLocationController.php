<?php

namespace App\Http\Controllers\Admin\Guest;

use App\Http\Controllers\Controller;
use App\Models\Wedding;
use App\Models\WeddingLocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WeddingLocationController extends Controller
{
    public function index()
    {
        $wedding = Wedding::where('created_by', Auth::id())->first();
        if (!$wedding) {
            abort(404, 'Wedding not found');
        }

        $weddingId = $wedding->id;
        $weddingLocation = WeddingLocation::where('wedding_id', $weddingId)->first();

        return view('guest_manager.wedding_location', [
            'weddingLocation' => $weddingLocation,
            'layout' => 'guest_manager_layout',
            'title' => 'Địa điểm tổ chức đám cưới',
        ]);
    }
}
