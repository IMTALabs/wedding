<?php

namespace App\Http\Controllers\Admin\Guest;

use App\Http\Controllers\Admin\BaseController;
use App\Http\Controllers\Controller;
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
        $this->title = 'Love Story';
        return view('guest_manager.love_story.index');
    }
}
