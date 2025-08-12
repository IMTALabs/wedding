<?php

namespace App\Livewire;

use App\Models\Event;
use App\Models\Wedding;
use Cloudstudio\Modal\LivewireModal;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateEvent extends LivewireModal
{
    public $isEditing = false;
    public $eventId;
    public $event_name = '';
    public $event_date = '';
    public $event_location = '';
    public $description = '';
    public $link_embed = '';

    protected $rules = [
        'event_name' => 'required|string|max:255',
        'event_date' => 'required|date',
        'event_location' => 'nullable|string|max:255',
        'description' => 'nullable|string|max:1000',
        'link_embed' => 'nullable|url|max:255',
    ];

    public function render()
    {
        return view('livewire.create-event');
    }

    public function save()
    {
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
}
