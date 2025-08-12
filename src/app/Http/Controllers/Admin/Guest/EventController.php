<?php

namespace App\Http\Controllers\Admin\Guest;

use App\Http\Controllers\Admin\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Wedding;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends BaseController
{
    protected $title = 'Sự kiện';

    /**
     * Display the event page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // We're now using Livewire for event management, so we only need to pass the title
        return view('guest_manager.event', [
            'title' => $this->title
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Handle the request to store event data
        // Example: Event::create($request->all());
        return redirect()->back()->with('success', 'Event created successfully.');
    }

    public function list(Request $request)
    {
        $user_id = $request->query('user_id', Auth::id());
        $wedding = Wedding::where('created_by', $user_id)->first();
        $events = Event::where('wedding_id', $wedding->id)
            ->orderBy('event_date')
            ->get()
            ->map(function ($event) {
                $event->title = $event->event_name;
                $event->start = Carbon::parse($event->event_date)->format('Y-m-d');
                $event->end = $event->start;
                $event->allDay = true;

                return $event;
            });

        return response()->json($events);
    }
}
