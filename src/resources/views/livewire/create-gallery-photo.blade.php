<div >
    {{-- Hiển thị thông báo thành công --}}
    @if ($successMessage)
        <div class="alert alert-success mb-2">
            {{ $successMessage }}
        </div>
    @endif
    {{-- Hiển thị thông báo lỗi --}}
    @if ($errorMessage)
        <div class="alert alert-danger mb-2">
            {{ $errorMessage }}
        </div>
    @endif

    <form wire:submit.prevent="save" >
        <div wire:ignore>
            <label for="post-form-7" class="form-label">Album</label>
            <select data-placeholder="Chọn album"
                    class="tom-select w-full"
                    id="post-form-7"
                    wire:model="album_id"
                    wire:change="getPhotoOfAlbumProperty($event.target.value)"
            >
                @foreach($albums as $album)
                    <option value="{{ $album->id }}">{{ $album->album_name }}</option>
                @endforeach
            </select>
            @if ($errorMessage && !$album_id)
                <div class="text-danger mt-1">{{ $errorMessage }}</div>
            @endif
        </div>
        <div class="mt-3">
            <label class="form-label">Ảnh</label>
            <div class="border-2 border-dashed dark:border-darkmode-400 rounded-md pt-4">
                <div class="flex flex-wrap px-4">
                @foreach($photos as $key => $value)
                    <div class="w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in">
                        <img class="rounded-md" alt="Ảnh album"
                             src="{{ Storage::url($value->image) }}">
                        <div title="Xóa ảnh này? Hành động này là không thể hoàn tác!"
                             class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-danger right-0 top-0 -mr-2 -mt-2"
                             wire:click="deletePhoto({{ $value->id }})"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="16"
                                height="16"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                class="lucide lucide-x w-4 h-4"
                            >
                                <path d="M18 6 6 18"></path>
                                <path d="m6 6 12 12"></path>
                            </svg>
                        </div>
                    </div>
                @endforeach
                </div>
                @if(empty($photos) || count($photos) == 0)
                    <div class="flex flex-wrap p-5 justify-center">
                        <p>Hiện album đang chưa có ảnh nào.</p>
                    </div>
                @endif
                <div class="px-4">
                    <x-filepond::upload wire:model="photo_update" :multiple="true" :required="true" />
                    @if ($errorMessage && empty($photo_update))
                        <div class="text-danger mt-1">{{ $errorMessage }}</div>
                    @endif
                </div>
            </div>
        </div>
        <div class="mt-3">
            <button type="submit" class="btn btn-primary" wire:loading.disable>Lưu thay đổi</button>
            <button type="button" class="btn btn-success" wire:click="postAlbumId">Sửa thông tin album</button>
            <button type="button" class="btn btn-danger" wire:click="deleteAlbum">Xóa album</button>
        </div>
    </form>
</div>
