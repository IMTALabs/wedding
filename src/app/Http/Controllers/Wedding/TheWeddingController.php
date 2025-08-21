<?php

namespace App\Http\Controllers\Wedding;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Wedding;
use Illuminate\Http\Request;

class TheWeddingController extends Controller
{
    public function index(Wedding $sub_domain){
//        dd($sub_domain);
        if(!$sub_domain) {
            return abort(404);
        }
        $event = Event::where('wedding_id', $sub_domain->id)->get() ?? [];
        return view('wedding.wedding-master', [
            'wedding' => $sub_domain,
            'events' => $event
        ]);
    }
}
