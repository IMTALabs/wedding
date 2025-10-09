<?php

namespace App\Http\Controllers\Wedding;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\GalleryAlbum;
use App\Models\Notification;
use App\Models\StorySection;
use App\Models\Wedding;
use App\Models\WeddingGiftBox;
use Illuminate\Http\Request;

class TheWeddingController extends Controller
{
    public function index(Wedding $sub_domain){
        if(!$sub_domain) {
            return abort(404);
        }
        $event = Event::where('wedding_id', $sub_domain->id)->get() ?? [];
        $love_stories = StorySection::where('wedding_id', $sub_domain->id)->orderBy('position')->get() ?? [];
        $gallery = GalleryAlbum::where('wedding_id', $sub_domain->id)->with('photos')->get()->toArray() ?? [];
        $notification = Notification::where('wedding_id', $sub_domain->id)->where('is_active', true)->first() ?? null;
        $giftBoxes = WeddingGiftBox::query()->with('bank')->where('wedding_id', $sub_domain->id)->get();
//        group bỏi type và lấy ra cái đầu tiên của cái type đó, key là typedđó
        $giftBoxes = $giftBoxes->groupBy('type')->map(function ($item) {
            return $item->first();
        });


        return view('wedding.wedding-master', [
            'wedding' => $sub_domain,
            'events' => $event,
            'love_stories' => $love_stories,
            'gallery' => $gallery,
            'notification' => $notification,
            'giftBoxes' => $giftBoxes,
        ]);
    }
}
