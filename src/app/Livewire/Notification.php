<?php

namespace App\Livewire;

use App\Models\Notification as NotificationModel;
use App\Models\Wedding;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Notification extends Component
{
    public $weddingId;
    public $notificationId;
    public $message = '';
    public $is_active = true;

    protected $rules = [
        'message' => 'required|string',
        'is_active' => 'boolean'
    ];

    protected $messages = [
        'message.required' => 'Nội dung thông báo là bắt buộc.'
    ];

    public function mount()
    {
        $wedding = Wedding::where('created_by', Auth::id())->first();
        if (!$wedding) {
            session()->flash('error', 'Không tìm thấy thông tin đám cưới.');
            return;
        }

        $this->weddingId = $wedding->id;
        $this->loadNotification();
    }

    public function loadNotification()
    {
        if (!$this->weddingId) {
            return;
        }

        $notification = NotificationModel::where('wedding_id', $this->weddingId)->first();
        if ($notification) {
            $this->notificationId = $notification->id;
            $this->message = $notification->message;
            $this->is_active = (bool) $notification->is_active;
        }
    }

    public function save()
    {
        $this->validate();

        if ($this->notificationId) {
            // Update existing
            $notification = NotificationModel::find($this->notificationId);
            if ($notification) {
                $notification->update([
                    'message' => $this->message,
                    'is_active' => $this->is_active,
                ]);
                session()->flash('success', 'Đã cập nhật thông báo thành công.');
                $this->dispatch('notification-updated');
            }
        } else {
            // Ensure only one notification per wedding
            $existing = NotificationModel::where('wedding_id', $this->weddingId)->first();
            if ($existing) {
                $this->notificationId = $existing->id;
                $existing->update([
                    'message' => $this->message,
                    'is_active' => $this->is_active,
                ]);
                session()->flash('success', 'Đã cập nhật thông báo hiện có.');
                $this->dispatch('notification-updated');
            } else {
                $notification = NotificationModel::create([
                    'wedding_id' => $this->weddingId,
                    'message' => $this->message,
                    'is_active' => $this->is_active,
                ]);
                $this->notificationId = $notification->id;
                session()->flash('success', 'Đã tạo thông báo mới.');
                $this->dispatch('notification-created');
            }
        }
    }

    public function toggleActive()
    {
        if (!$this->notificationId) {
            return;
        }
        $notification = NotificationModel::find($this->notificationId);
        if ($notification) {
            $notification->is_active = !$notification->is_active;
            $notification->save();
            $this->is_active = (bool) $notification->is_active;
            session()->flash('success', 'Đã cập nhật trạng thái thông báo.');
            $this->dispatch('notification-toggled');
        }
    }

    public function render()
    {
        return view('livewire.notification');
    }
}
