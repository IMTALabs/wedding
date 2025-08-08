<?php

namespace App\Livewire;

use App\Models\GalleryAlbum;
use App\Models\Wedding;
use Livewire\Attributes\On;
use Livewire\Component;

class CreateAlbum extends Component
{
    public string $album_name;
    public string $album_description;
    public $album;
    public $weddindId;

    public function mount()
    {
        $this->album_name = '';
        $this->album_description = '';
        $this->weddindId = Wedding::where('created_by', auth()->id())->value('id');

        if (!$this->weddindId) {
            return abort(404);
        }
    }

    public function save()
    {
        $this->validate([
            'album_name' => 'required|string|max:255',
            'album_description' => 'nullable|string|max:1000',
        ],
        [
            'album_name.required' => 'Tên album là bắt buộc.',
            'album_name.string' => 'Tên album phải là một chuỗi.',
            'album_name.max' => 'Tên album không được vượt quá 255 ký tự.',
            'album_description.string' => 'Mô tả album phải là một chuỗi.',
            'album_description.max' => 'Mô tả album không được vượt quá 1000 ký tự.',
        ]);
        try {
            if ($this->album) {
                $this->album->update([
                    'album_name' => $this->album_name,
                    'description' => $this->album_description,
                ]);
                session()->flash('success_album', 'Album updated successfully!');
            } else {
                GalleryAlbum::create([
                    'album_name' => $this->album_name,
                    'description' => $this->album_description,
                    'wedding_id' => $this->weddindId
                ]);
                session()->flash('success_album', 'Album created successfully!');
            }
            $this->reset(['album_name', 'album_description', 'album']);
        } catch (\Exception $e) {
            session()->flash('error', 'Có lỗi xảy ra khi cập nhật thông tin: ' . $e->getMessage());
            $this->dispatch('show-error-notification');
        }
    }

    #[On('updateAlbum')]
    public function updateAlbum($albumId) {
        if($albumId) {
            $this->album = GalleryAlbum::find($albumId);
            if ($this->album) {
                $this->album_name = $this->album->album_name;
                $this->album_description = $this->album->description;
            }
        }
    }

    public function render()
    {
        return view('livewire.create-album');
    }
}
