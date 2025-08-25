<?php

namespace App\Http\Controllers\Wedding;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\GalleryAlbum;
use App\Models\StorySection;
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
        $love_stories = StorySection::where('wedding_id', $sub_domain->id)->orderBy('position')->get() ?? [];
        $gallery = GalleryAlbum::where('wedding_id', $sub_domain->id)->with('photos')->get()->toArray() ?? [];

        return view('wedding.wedding-master', [
            'wedding' => $sub_domain,
            'events' => $event,
            'love_stories' => $love_stories,
            'gallery' => $gallery,
        ]);
    }
}
