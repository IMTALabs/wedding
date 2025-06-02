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
        $currentMonth = now()->format('F');

        $eventsInSidebar = [
            ['title' => 'VueJS Amsterdam', 'days' => 2, 'time' => '10:00 AM', 'color' => 'bg-pending'],
            ['title' => 'Vue Fes Japan 2019', 'days' => 3, 'time' => '07:00 AM', 'color' => 'bg-warning'],
            ['title' => 'Laracon 2021', 'days' => 4, 'time' => '11:00 AM', 'color' => 'bg-pending'],
        ];

        $year = now()->year;
        $month = now()->month;
        $daysInMonth = \Carbon\Carbon::create($year, $month)->daysInMonth;
        $firstDayOfMonth = \Carbon\Carbon::create($year, $month, 1)->dayOfWeek;
        $calendarGrid = [];
        $dayCounter = 1;

        for ($i = 0; $i < ceil(($daysInMonth + $firstDayOfMonth) / 7) * 7; $i++) {
            if ($i < $firstDayOfMonth || $dayCounter > $daysInMonth) {
                $calendarGrid[] = ['day' => '', 'class' => 'text-slate-500'];
            } else {
                $event = null;
                if ($dayCounter === 6) { // Ví dụ có sự kiện vào ngày 6
                    $event = ['title' => 'Sự kiện nhỏ', 'color' => 'bg-success'];
                } elseif ($dayCounter === 8) { // Ví dụ có sự kiện vào ngày 8
                    $event = ['title' => 'Sự kiện quan trọng', 'color' => 'bg-primary'];
                } elseif ($dayCounter === 23) { // Ví dụ có sự kiện vào ngày 23
                    $event = ['title' => 'Sự kiện khác', 'color' => 'bg-pending'];
                } elseif ($dayCounter === 27) { // Ví dụ có sự kiện vào ngày 27
                    $event = ['title' => 'Sự kiện', 'color' => 'bg-primary'];
                }
                $calendarGrid[] = ['day' => $dayCounter, 'class' => '', 'event' => $event];
                $dayCounter++;
            }
        }

        $legendEvents = [
            ['color' => 'bg-pending', 'label' => 'Independence Day', 'date' => '23th'],
            ['color' => 'bg-primary', 'label' => 'Memorial Day', 'date' => '10th'],
        ];

        // Tạo $calendarGridLarge tương tự, có thể chứa nhiều sự kiện trong một ngày

        $calendarGridLarge = [];
        $dayCounterLarge = 1;
        for ($i = 0; $i < ceil(($daysInMonth + $firstDayOfMonth) / 7) * 7; $i++) {
            if ($i < $firstDayOfMonth || $dayCounterLarge > $daysInMonth) {
                $calendarGridLarge[] = ['day' => '', 'class' => 'text-slate-500'];
            } else {
                $eventsOnDay = [];
                if ($dayCounterLarge === 8) {
                    $eventsOnDay[] = ['title' => 'Họp', 'color' => 'bg-primary'];
                    $eventsOnDay[] = ['title' => 'Ăn trưa', 'color' => 'bg-warning'];
                } elseif ($dayCounterLarge === 15) {
                    $eventsOnDay[] = ['title' => 'Thuyết trình', 'color' => 'bg-success'];
                }
                $calendarGridLarge[] = ['day' => $dayCounterLarge, 'class' => '', 'events' => $eventsOnDay];
                $dayCounterLarge++;
            }
        }
        return view('guest_manager.event', [
            'eventsInSidebar' => $eventsInSidebar,
            'currentMonth' => $currentMonth,
            'calendarGrid' => $calendarGrid,
            'legendEvents' => $legendEvents,
            'calendarGridLarge' => $calendarGridLarge,
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
