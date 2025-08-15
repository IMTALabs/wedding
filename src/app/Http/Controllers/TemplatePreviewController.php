<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TemplatePreviewController extends Controller
{
    public function show($template)
    {
        return view('templates.' . $template . '.index');
    }
}
