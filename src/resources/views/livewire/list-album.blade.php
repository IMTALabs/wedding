<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
        <a href="{{ route('guest_admin.album.create') }}" class="btn btn-primary shadow-md mr-2">Thêm mới ảnh</a>
        <div class="ml-2">
            <button wire:click="sortAlbumBy('album_name')" class="btn btn-outline-secondary mr-1 gap-2">
                Sắp xếp album theo tên
                @if($sortAlbum === 'album_name')
                    <span>
                        @if($sortAlbumDirection === 'asc')
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v14m7-7l-7 7l-7-7"/></svg>
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m5 12l7-7l7 7m-7 7V5"/></svg>
                        @endif
                    </span>
                @endif
            </button>
            <button wire:click="sortAlbumBy('created_at')" class="btn btn-outline-secondary mr-1 gap-2">
                Sắp xếp album theo ngày tạo
                @if($sortAlbum === 'created_at')
                    @if($sortAlbumDirection === 'asc')
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v14m7-7l-7 7l-7-7"/></svg>
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m5 12l7-7l7 7m-7 7V5"/></svg>
                    @endif
                @endif
            </button>
            <button wire:click="sortPhotoBy('created_at')" class="btn btn-outline-secondary mr-1 gap-2">
                Sắp xếp ảnh theo ngày tạo
                @if($sortPhoto === 'created_at')
                    @if($sortPhotoDirection === 'asc')
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v14m7-7l-7 7l-7-7"/></svg>
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m5 12l7-7l7 7m-7 7V5"/></svg>
                    @endif
                @endif
            </button>
            <button wire:click="sortPhotoBy('caption')" class="btn btn-outline-secondary mr-1 gap-2">
                Sắp xếp ảnh theo tên
                @if($sortPhoto === 'caption')
                    @if($sortPhotoDirection === 'asc')
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v14m7-7l-7 7l-7-7"/></svg>
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m5 12l7-7l7 7m-7 7V5"/></svg>
                    @endif
                @endif
            </button>
        </div>
    </div>
    <!-- BEGIN: Albums Layout -->
    @forelse($albums as $album)
        <div class="intro-y col-span-12">
            <div class="box">
                <div class="p-5 border-b flex justify-start items-center cursor-pointer" wire:click="toggleAlbum({{ $album->id }})">
                    <div class="flex-1">
                        <div class="font-bold text-lg">{{ $album->album_name }}</div>
                        <div class="text-slate-500">Ngày tạo: {{ $album->created_at ? $album->created_at->format('d/m/Y') : '' }}</div>
                        <div class="text-slate-500">Mô tả: {{ $album->description }}</div>
                    </div>
                    <div class="ml-4">
                        <span>
                            @if(!empty($expandedAlbums[$album->id]))
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v14m7-7l-7 7l-7-7"/></svg>
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7-7l7 7l-7 7"/></svg>
                            @endif
                        </span>
                    </div>
                </div>
                @if(!empty($expandedAlbums[$album->id]))
                    <div class="p-5 grid grid-cols-12 gap-4">
                        @forelse($album->photos as $photo)
                            <div class="col-span-12 md:col-span-6 lg:col-span-4 xl:col-span-3">
                                <div class="box">
                                    <div class="p-5">
                                        <div class="h-40 2xl:h-56 image-fit rounded-md overflow-hidden relative">
                                            <img alt="{{ $photo->caption }}" class="rounded-md w-full h-full object-cover" src="{{ $photo->image ? \Illuminate\Support\Facades\Storage::url($photo->image) : asset('assets/enigma-template/dist/images/preview-11.jpg') }}">
                                        </div>
                                        <div class="text-slate-600 dark:text-slate-500 mt-5">
                                            <div class="flex items-center mt-2"><i data-lucide="check-square" class="w-4 h-4 mr-2"></i> Ngày tạo: {{ $photo->created_at ? $photo->created_at->format('d/m/Y') : '' }}</div>
                                            <div class="flex items-center mt-2"><i data-lucide="image" class="w-4 h-4 mr-2"></i> Tên ảnh: {{ $photo->caption }}</div>
                                        </div>
                                    </div>
                                    <div class="flex justify-center lg:justify-end items-center p-5 border-t border-slate-200/60 dark:border-darkmode-400">
                                        <a class="flex items-center text-primary mr-auto" data-tw-toggle="modal" data-tw-target="#show-image-modal-{{ $photo->id }}" href="#"> <i data-lucide="eye" class="w-4 h-4 mr-1"></i> Preview </a>
                                        <a class="flex items-center text-danger" href="javascript:;" wire:click.stop="confirmDeletePhoto({{ $photo->id }})">
                                            <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Delete
                                        </a>
                                    </div>
                                </div>
                                <!-- Modal Show Image -->
                                <div id="show-image-modal-{{ $photo->id }}" class="modal" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-body p-0">
                                                <div class="p-5 text-center">
                                                    <img alt="{{ $photo->caption }}" class="rounded-md" src="{{ $photo->image ? \Illuminate\Support\Facades\Storage::url($photo->image) : asset('assets/enigma-template/dist/images/preview-11.jpg') }}">
                                                </div>
                                                <div class="px-5 pb-8 text-center">
                                                    <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Đóng</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal Delete Confirmation (Livewire) -->
                                @if($deletePhotoId)
                                    <div class="modal show" tabindex="-1" style="display:block;" aria-modal="true" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-body p-0">
                                                    <div class="p-5 text-center">
                                                        <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                                                        <div class="text-3xl mt-5">Bạn có chắc chắn xóa?</div>
                                                        <div class="text-slate-500 mt-2">
                                                            Bạn có thực sự muốn xóa ảnh này không?
                                                            <br>
                                                            Hành động này sẽ không thể hoàn tác.
                                                        </div>
                                                    </div>
                                                    <div class="px-5 pb-8 text-center">
                                                        <button type="button" class="btn btn-outline-secondary w-24 mr-1" wire:click="$set('deletePhotoId', null)">Hủy</button>
                                                        <button type="button" class="btn btn-danger w-24" wire:click="deletePhoto">Xóa</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @empty
                            <div class="col-span-12 text-center text-slate-500 py-10">
                                Không có ảnh nào trong album này.
                            </div>
                        @endforelse
                    </div>
                @endif
            </div>
        </div>
    @empty
        <div class="intro-y col-span-12 text-center text-slate-500 py-10">
            Không có album nào.
        </div>
    @endforelse
</div>
