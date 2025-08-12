<?php

namespace App\Http\Controllers\Admin\Guest;

use App\Http\Controllers\Admin\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Wedding;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LoveStoryController extends BaseController
{
    /**
     * @return View
     * @author tienhc
     *
     */
    public function index()
    {
        $this->title = 'Câu Chuyện Tình Yêu';

        // Ensure wedding exists for current user (same pattern as WeddingLocation)
        $wedding = Wedding::where('created_by', Auth::id())->first();
        if (!$wedding) {
            abort(404, 'Wedding not found');
        }

        return view('guest_manager.love_story.index', [
            'layout' => 'guest_manager_layout',
            'title' => $this->title,
        ]);
    }
}
