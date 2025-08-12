<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class BaseController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @var string
     */
    protected $layout = 'guest_manager_layout'; // Layout mặc định
    protected $title = 'Guest Manager'; // Tiêu đề mặc định

    public function __construct()
    {
        // Kiểm tra trạng thái dark mode (ví dụ: từ session, cookie, hoặc request)
        // if (session()->has('guest_mananger_layout_dark_mode') && session('guest_mananger_layout_dark_mode')) {
        //     $this->layout = 'guest_mananger_layout_dark_mode';
        // }

        // Chia sẻ biến layout với tất cả các view kế thừa từ controller này
        View::share('title', $this->title);
        View::share('layout', $this->layout);
    }

    // Setter
    protected function setLayout($layout)
    {
        $this->layout = $layout;
        View::share('layout', $this->layout);
    }

    protected function setTitle($title)
    {
        $this->title = $title;
        View::share('title', $this->title);
    }
}
