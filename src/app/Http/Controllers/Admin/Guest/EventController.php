<?php

namespace App\Http\Controllers\Admin\Guest;

use App\Http\Controllers\Admin\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
}
