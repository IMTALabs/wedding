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

    protected $messages = [
        'event_name.required' => 'Tên sự kiện là bắt buộc.',
        'event_date.required' => 'Ngày sự kiện là bắt buộc.',
        'event_date.date' => 'Ngày sự kiện không hợp lệ.',
        'event_location.max' => 'Địa điểm sự kiện không được vượt quá 255 ký tự.',
        'description.max' => 'Mô tả không được vượt quá 1000 ký tự.',
        'link_embed.url' => 'Liên kết nhúng không hợp lệ.',
        'link_embed.max' => 'Liên kết nhúng không được vượt quá 255 ký tự.',
    ];

    public function mount($eventId = null, $isEditing = false)
    {
        $this->isEditing = $isEditing;
        $this->eventId = $eventId;

        if ($this->isEditing && $eventId) {
            $event = Event::find($eventId);
            if ($event) {
                $this->event_name = $event->event_name;
                $this->event_date = $event->event_date->format('Y-m-d');
                $this->event_location = $event->event_location;
                $this->description = $event->description;
                $this->link_embed = $event->link_embed;
            }
        }
    }

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

            // Dispatch event to refresh calendar
            $this->dispatch('refresh-calendar')->to(EventManager::class);
            $this->closeModal();
        } catch (\Exception $e) {
            session()->flash('error', 'Có lỗi xảy ra: ' . $e->getMessage());
        }
    }

    public function delete()
    {
        if ($this->isEditing && $this->eventId) {
            try {
                $event = Event::find($this->eventId);
                if ($event) {
                    $event->delete();
                    session()->flash('success', 'Sự kiện đã được xóa thành công!');
                    $this->dispatch('refresh-calendar')->to(EventManager::class);
                    $this->closeModal();
                }
            } catch (\Exception $e) {
                session()->flash('error', 'Có lỗi xảy ra khi xóa sự kiện: ' . $e->getMessage());
            }
        } else {
            session()->flash('error', 'Không có sự kiện nào để xóa.');
        }
    }
}
