<?php

namespace App\Livewire;

use App\Models\Event;
use App\Models\Wedding;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class EventManager extends Component
{
    // Properties for event list
    public $events = [];
    public $currentMonth;
    public $calendarGrid = [];
    public $legendEvents = [];

    // Properties for event form
    public $showEventModal = false;
    public $isEditing = false;
    public $eventId;
    public $event_name = '';
    public $event_date = '';
    public $event_location = '';
    public $description = '';
    public $link_embed = '';

    // Event listeners
    protected $listeners = [
        'openEventModal' => 'handleOpenEventModal',
        'setEventDate' => 'handleSetEventDate',
        'closeEventModal' => 'closeEventModal'
    ];

    // Validation rules
    protected $rules = [
        'event_name' => 'required|string|max:255',
        'event_date' => 'required|date',
        'event_location' => 'nullable|string|max:255',
        'description' => 'nullable|string',
        'link_embed' => 'nullable|string',
    ];

    protected $messages = [
        'event_name.required' => 'Tên sự kiện là bắt buộc.',
        'event_name.max' => 'Tên sự kiện không được quá 255 ký tự.',
        'event_date.required' => 'Ngày sự kiện là bắt buộc.',
        'event_date.date' => 'Ngày sự kiện phải là một ngày hợp lệ.',
        'event_location.max' => 'Địa điểm không được quá 255 ký tự.',
    ];

    public function mount()
    {
        $this->loadEvents();
        $this->setupCalendar();
    }

    public function loadEvents()
    {
        $user = Auth::user();
        $wedding = Wedding::where('created_by', $user->id)->first();

        if ($wedding) {
            $this->events = Event::where('wedding_id', $wedding->id)
                ->orderBy('event_date')
                ->get()
                ->toArray();
        } else {
            $this->events = [];
        }
    }

    public function setupCalendar()
    {
        $this->currentMonth = now()->format('F');

        $year = now()->year;
        $month = now()->month;
        $daysInMonth = \Carbon\Carbon::create($year, $month)->daysInMonth;
        $firstDayOfMonth = \Carbon\Carbon::create($year, $month, 1)->dayOfWeek;

        $this->calendarGrid = [];
        $dayCounter = 1;

        for ($i = 0; $i < ceil(($daysInMonth + $firstDayOfMonth) / 7) * 7; $i++) {
            if ($i < $firstDayOfMonth || $dayCounter > $daysInMonth) {
                $this->calendarGrid[] = ['day' => '', 'class' => 'text-slate-500'];
            } else {
                $eventsOnDay = [];
                $dayDate = \Carbon\Carbon::create($year, $month, $dayCounter)->format('Y-m-d');

                foreach ($this->events as $event) {
                    $eventDate = \Carbon\Carbon::parse($event['event_date'])->format('Y-m-d');
                    if ($eventDate === $dayDate) {
                        $eventsOnDay[] = [
                            'id' => $event['id'],
                            'title' => $event['event_name'],
                            'color' => 'bg-primary'
                        ];
                    }
                }

                $this->calendarGrid[] = [
                    'day' => $dayCounter,
                    'class' => '',
                    'events' => $eventsOnDay
                ];
                $dayCounter++;
            }
        }

        // Setup legend events (upcoming events)
        $this->legendEvents = [];
        $upcomingEvents = collect($this->events)
            ->filter(function($event) {
                return \Carbon\Carbon::parse($event['event_date'])->isFuture();
            })
            ->take(2);

        foreach ($upcomingEvents as $event) {
            $this->legendEvents[] = [
                'id' => $event['id'],
                'color' => 'bg-primary',
                'label' => $event['event_name'],
                'date' => \Carbon\Carbon::parse($event['event_date'])->format('jS')
            ];
        }
    }

    public function openEventModal($eventId = null)
    {
        $this->resetValidation();
//        $this->resetExcept(['events', 'currentMonth', 'calendarGrid', 'legendEvents']);

        if ($eventId) {
            $this->isEditing = true;
            $this->eventId = $eventId;
            $event = Event::find($eventId);

            if ($event) {
                $this->event_name = $event->event_name;
                $this->event_date = $event->event_date->format('Y-m-d');
                $this->event_location = $event->event_location;
                $this->description = $event->description;
                $this->link_embed = $event->link_embed;
            }
        } else {
            $this->isEditing = false;
        }

        $this->showEventModal = true;
    }

    public function closeEventModal()
    {
        $this->showEventModal = false;
    }

    public function save()
    {
        dd(1);
        $this->validate();

        $user = Auth::user();
        $wedding = Wedding::where('created_by', $user->id)->first();

        if (!$wedding) {
            session()->flash('error', 'Không tìm thấy thông tin đám cưới.');
            return;
        }

        try {
            $eventData = [
                'wedding_id' => $wedding->id,
                'event_name' => $this->event_name,
                'event_date' => $this->event_date,
                'event_location' => $this->event_location,
                'description' => $this->description,
                'link_embed' => $this->link_embed,
            ];

            if ($this->isEditing) {
                $event = Event::find($this->eventId);
                if ($event) {
                    $event->update($eventData);
                    session()->flash('success', 'Sự kiện đã được cập nhật thành công!');
                }
            } else {
                Event::create($eventData);
                session()->flash('success', 'Sự kiện đã được tạo thành công!');
            }

            $this->closeEventModal();
            $this->loadEvents();
            $this->setupCalendar();

            // Dispatch event to refresh calendar
            $this->dispatch('refreshCalendar');

        } catch (\Exception $e) {
            session()->flash('error', 'Có lỗi xảy ra: ' . $e->getMessage());
        }
    }

    public function deleteEvent($eventId)
    {
        try {
            $event = Event::find($eventId);
            if ($event) {
                $event->delete();
                session()->flash('success', 'Sự kiện đã được xóa thành công!');
                $this->loadEvents();
                $this->setupCalendar();
            }
        } catch (\Exception $e) {
            session()->flash('error', 'Có lỗi xảy ra khi xóa sự kiện: ' . $e->getMessage());
        }
    }

    /**
     * Handle the openEventModal event from JavaScript
     */
    public function handleOpenEventModal($data = null)
    {
        if (isset($data['eventId'])) {
            $this->openEventModal($data['eventId']);
        } else {
            $this->openEventModal();
        }
    }

    /**
     * Handle the setEventDate event from JavaScript
     */
    public function handleSetEventDate($data)
    {
        if (isset($data['date'])) {
            $this->event_date = $data['date'];
        }
    }

    public function render()
    {
        return view('livewire.event-manager');
    }
}
