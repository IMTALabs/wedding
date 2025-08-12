<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\GalleryAlbum;
use App\Models\GalleryPhoto;

class ListAlbum extends Component
{
    public $sortAlbum = 'created_at';
    public $sortAlbumDirection = 'desc';
    public $sortPhoto = 'created_at';
    public $sortPhotoDirection = 'desc';
    public $expandedAlbums = [];
    public $deletePhotoId = null;

    public function sortAlbumBy($field)
    {
        if ($this->sortAlbum === $field) {
            $this->sortAlbumDirection = $this->sortAlbumDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortAlbum = $field;
            $this->sortAlbumDirection = 'asc';
        }
    }

    public function sortPhotoBy($field)
    {
        if ($this->sortPhoto === $field) {
            $this->sortPhotoDirection = $this->sortPhotoDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortPhoto = $field;
            $this->sortPhotoDirection = 'asc';
        }
    }

    public function toggleAlbum($albumId)
    {
        if (isset($this->expandedAlbums[$albumId]) && $this->expandedAlbums[$albumId]) {
            $this->expandedAlbums[$albumId] = false;
        } else {
            $this->expandedAlbums[$albumId] = true;
        }
    }

    public function confirmDeletePhoto($photoId)
    {
        $this->deletePhotoId = $photoId;
    }

    public function deletePhoto()
    {
        if ($this->deletePhotoId) {
            $photo = GalleryPhoto::find($this->deletePhotoId);
            if ($photo) {
                // Xóa file ảnh nếu cần
                if ($photo->image && \Storage::exists($photo->image)) {
                    \Storage::delete($photo->image);
                }
                $photo->delete();
            }
            $this->deletePhotoId = null;
        }
    }

    public function render()
    {
        $albums = GalleryAlbum::with(['photos' => function ($query) {
            $query->orderBy($this->sortPhoto, $this->sortPhotoDirection);
        }])
        ->orderBy($this->sortAlbum, $this->sortAlbumDirection)
        ->get();

        return view('livewire.list-album', [
            'albums' => $albums,
            'sortAlbum' => $this->sortAlbum,
            'sortAlbumDirection' => $this->sortAlbumDirection,
            'sortPhoto' => $this->sortPhoto,
            'sortPhotoDirection' => $this->sortPhotoDirection,
            'expandedAlbums' => $this->expandedAlbums,
        ]);
    }
}
