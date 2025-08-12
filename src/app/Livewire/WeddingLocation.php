<?php

namespace App\Livewire;

use App\Models\Wedding;
use App\Models\WeddingLocation as WeddingLocationModel;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class WeddingLocation extends Component
{
    public $weddingId;
    public $locations = [];
    public $newLocation = [
        'name_location' => '',
        'date' => '',
        'type' => 'ceremony',
        'link_embed' => '',
        'is_hidden' => false,
    ];

    protected $rules = [
        'locations.*.name_location' => 'required|string|max:255',
        'locations.*.date' => 'required|date',
        'locations.*.type' => 'required|string|in:ceremony,reception,bride_home,groom_home,other',
        'locations.*.link_embed' => 'nullable|url',
        'locations.*.is_hidden' => 'boolean',
        'newLocation.name_location' => 'nullable|string|max:255',
        'newLocation.date' => 'nullable|date',
        'newLocation.type' => 'required|string|in:ceremony,reception,bride_home,groom_home,other',
        'newLocation.link_embed' => 'nullable|url',
        'newLocation.is_hidden' => 'boolean',
    ];

    protected $messages = [
        'locations.*.name_location.required' => 'Tên địa điểm là bắt buộc.',
        'locations.*.date.required' => 'Ngày giờ là bắt buộc.',
        'locations.*.date.date' => 'Ngày giờ không hợp lệ.',
        'locations.*.link_embed.url' => 'Link địa điểm phải là URL hợp lệ.',
        'newLocation.name_location.required' => 'Tên địa điểm là bắt buộc.',
        'newLocation.date.required' => 'Ngày giờ là bắt buộc.',
        'newLocation.date.date' => 'Ngày giờ không hợp lệ.',
        'newLocation.link_embed.url' => 'Link địa điểm phải là URL hợp lệ.',
    ];

    public function mount()
    {
        $wedding = Wedding::where('created_by', Auth::id())->first();
        if (!$wedding) {
            session()->flash('error', 'Không tìm thấy thông tin đám cưới.');
            return;
        }

        $this->weddingId = $wedding->id;
        $this->loadLocations();
    }

    public function loadLocations()
    {
        if (!$this->weddingId) {
            return;
        }

        $locations = WeddingLocationModel::where('wedding_id', $this->weddingId)
            ->orderBy('date')
            ->get();

        $this->locations = $locations->map(function ($location) {
            return [
                'id' => $location->id,
                'name_location' => $location->name_location,
                'date' => $location->date ? $location->date->format('Y-m-d\TH:i') : '',
                'type' => $location->type,
                'link_embed' => $location->link_embed,
                'is_hidden' => $location->is_hidden,
            ];
        })->toArray();
    }

    public function addLocation()
    {
        $this->validate([
            'newLocation.name_location' => 'required|string|max:255',
            'newLocation.date' => 'required|date',
            'newLocation.type' => 'required|string|in:ceremony,reception,bride_home,groom_home,other',
            'newLocation.link_embed' => 'nullable|url',
        ]);

        WeddingLocationModel::create([
            'wedding_id' => $this->weddingId,
            'name_location' => $this->newLocation['name_location'],
            'date' => $this->newLocation['date'],
            'type' => $this->newLocation['type'],
            'link_embed' => $this->newLocation['link_embed'],
            'is_hidden' => $this->newLocation['is_hidden'],
        ]);

        // Reset form
        $this->newLocation = [
            'name_location' => '',
            'date' => '',
            'type' => 'ceremony',
            'link_embed' => '',
            'is_hidden' => false,
        ];

        $this->loadLocations();
        
        $this->dispatch('location-added');
        session()->flash('success', 'Đã thêm địa điểm mới thành công.');
    }

    public function updateLocation($index)
    {
        $this->validate([
            "locations.{$index}.name_location" => 'required|string|max:255',
            "locations.{$index}.date" => 'required|date',
            "locations.{$index}.type" => 'required|string|in:ceremony,reception,bride_home,groom_home,other',
            "locations.{$index}.link_embed" => 'nullable|url',
        ]);

        $location = WeddingLocationModel::find($this->locations[$index]['id']);
        if ($location) {
            $location->update([
                'name_location' => $this->locations[$index]['name_location'],
                'date' => $this->locations[$index]['date'],
                'type' => $this->locations[$index]['type'],
                'link_embed' => $this->locations[$index]['link_embed'],
                'is_hidden' => $this->locations[$index]['is_hidden'],
            ]);

            $this->dispatch('location-updated');
            session()->flash('success', 'Đã cập nhật địa điểm thành công.');
        }
    }

    public function deleteLocation($index)
    {
        $location = WeddingLocationModel::find($this->locations[$index]['id']);
        if ($location) {
            $location->delete();
            $this->loadLocations();
            $this->dispatch('location-deleted');
            session()->flash('success', 'Đã xóa địa điểm thành công.');
        }
    }

    public function getLocationTypeLabel($type)
    {
        $types = [
            'ceremony' => 'Lễ cưới',
            'reception' => 'Tiệc cưới',
            'bride_home' => 'Nhà cô dâu',
            'groom_home' => 'Nhà chú rể',
            'other' => 'Khác',
        ];

        return $types[$type] ?? $type;
    }

    public function render()
    {
        return view('livewire.wedding-location');
    }
}
