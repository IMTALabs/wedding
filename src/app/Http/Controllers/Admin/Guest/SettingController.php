<?php

namespace App\Http\Controllers\Admin\Guest;

use App\Http\Controllers\Admin\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends BaseController
{
    protected $title = 'Thiết lập trang web';

    /**
     * Display the settings page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('guest_manager.setting');
    }

    public function update(Request $request)
    {
        // Validate and update settings
        // Example: $request->validate([...]);
        // Setting::update([...]);

        return redirect()->back()->with('success', 'Settings updated successfully.');
    }
}
