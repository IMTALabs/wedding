<?php

namespace App\Http\Controllers\Wedding;

use App\Http\Controllers\Controller;
use App\Models\Wedding;
use Illuminate\Http\Request;

class TheWeddingController extends Controller
{
    public function index(Wedding $sub_domain){
//        dd($sub_domain);
        return view('wedding.wedding-master', [
            'wedding' => $sub_domain,
        ]);
    }
}
