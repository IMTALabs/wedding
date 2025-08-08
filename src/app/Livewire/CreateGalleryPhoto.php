<?php

namespace App\Livewire;

use App\Models\GalleryAlbum;
use App\Models\GalleryPhoto;
use App\Models\Wedding;
use Livewire\Component;
use Spatie\LivewireFilepond\WithFilePond;

class CreateGalleryPhoto extends Component
{
    use WithFilePond;

    public $photos = null;
    public $photo_update = [];
    public $albums;
    public $album_id;
    public $successMessage;
    public $errorMessage;

    public function mount()
    {
        $this->photos = [];
        $this->album_id = null;
        $this->getAlbum();
    }

    public function getAlbum() {
        $weddingId = Wedding::where('created_by', auth()->id())->value('id');
        $this->albums = GalleryAlbum::where('wedding_id', $weddingId)->get();
    }

    public function getPhotoOfAlbumProperty($album_id)
    {
        $album = GalleryAlbum::find($this->album_id);
        $this->photos = $album ? $album->photos()->get() : null;
    }

    public function save()
    {
        $this->resetMessages();

        if (!$this->album_id) {
            $this->errorMessage = 'Bạn phải chọn album!';
            return;
        }

        if (empty($this->photo_update)) {
            $this->errorMessage = 'Bạn phải chọn ít nhất một ảnh!';
            return;
        }

        foreach ($this->photo_update as $file) {
            $photoUpdate = $file->store('album', 'public');
            GalleryPhoto::create([
                'album_id' => $this->album_id,
                'image' => $photoUpdate,
            ]);
        }

        $this->successMessage = 'Thêm ảnh thành công!';
        $this->photo_update = [];
        $this->getPhotoOfAlbumProperty($this->album_id);
    }

    public function deletePhoto($photoId)
    {
        $photo = GalleryPhoto::find($photoId);
        if ($photo) {
            \Storage::disk('public')->delete($photo->image);
            $photo->delete();
            $this->successMessage = 'Xóa ảnh thành công!';
            $this->getPhotoOfAlbumProperty($this->album_id);
        } else {
            $this->errorMessage = 'Không tìm thấy ảnh!';
        }
    }

    private function resetMessages()
    {
        $this->successMessage = null;
        $this->errorMessage = null;
    }

    public function deleteAlbum()
    {
        $album = GalleryAlbum::find($this->album_id);
        if ($album) {
            try {
                \DB::beginTransaction();
                $photos = $album->photos;
                foreach ($photos as $photo) {
                    \Storage::disk('public')->delete($photo->image);
                    $photo->delete();
                }
                $album->delete();
                $this->successMessage = 'Xóa album thành công!';
                $this->albums = GalleryAlbum::where('wedding_id', Wedding::where('created_by', auth()->id())->value('id'))->get();
                $this->photos = [];
                $this->getAlbum();
                \DB::commit();
            }catch (\Exception $e) {
                \DB::rollBack();
                $this->errorMessage = 'Lỗi khi xóa album: ' . $e->getMessage();
            }
        } else {
            $this->errorMessage = 'Không tìm thấy album!';
        }
    }

    public function postAlbumId() {
        $this->dispatch('updateAlbum', albumId: (int) $this->album_id);
    }

    public function render()
    {
        return view('livewire.create-gallery-photo');
    }
}
