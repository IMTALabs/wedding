<div class="mt-4">
    @if (session('success'))
        <div class="alert alert-success-soft show flex items-center mb-2" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path d="M21.801 10A10 10 0 1 1 17 3.335"/><path d="m9 11l3 3L22 4"/></g></svg>
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger-soft show flex items-center mb-2" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 8v4m0 4h.01"/></g></svg>
            {{ session('error') }}
        </div>
    @endif

    {{-- Existing Story Sections --}}
    @if (count($sections) > 0)
        <div class="intro-y col-span-12 lg:col-span-12 mb-6">
            <div class="intro-y box">
                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60">
                    <h2 class="font-medium text-base mr-auto">
                        Danh sách phần câu chuyện
                    </h2>
                </div>
                <div class="p-5 space-y-4">
                    @foreach ($sections as $index => $section)
                        <div class="rounded-md">
                            <div class="grid grid-cols-12 gap-4">
                                <div class="col-span-12 sm:col-span-6">
                                    <label class="form-label">Tiêu đề</label>
                                    <input type="text" class="form-control" wire:model.defer="sections.{{ $index }}.title" placeholder="VD: Lần đầu gặp gỡ">
                                    @error("sections.{$index}.title")
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-span-12 sm:col-span-6">
                                    <label class="form-label">Vị trí</label>
                                    <input type="number" class="form-control" wire:model.defer="sections.{{ $index }}.position" placeholder="0">
                                    @error("sections.{$index}.position")
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-span-12 sm:col-span-6">
                                    <label class="form-label">Ảnh hiện tại</label>
                                    @if($section['image'])
                                        <div class="mb-2">
                                            <img src="{{ Storage::url($section['image']) }}" alt="Story image" class="rounded-md w-full object-contain">
                                        </div>
                                    @else
                                        <div class="text-slate-500 mb-2 text-xs">Chưa có ảnh</div>
                                    @endif
                                    <div class="mb-2">
                                        <x-filepond::upload wire:model="sectionImages.{{ $index }}" :multiple="false" />
                                        <div class="text-xs text-slate-500 mt-1">Chọn ảnh mới để thay thế hoặc để trống để giữ nguyên.</div>
                                    </div>
                                    <input type="text" class="form-control" wire:model.defer="sections.{{ $index }}.image" placeholder="Hoặc dán URL ảnh">
                                    @error("sections.{$index}.image")
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-span-12 sm:col-span-6">
                                    <label class="form-label">Nội dung</label>
                                    <textarea class="form-control" rows="4" wire:model.defer="sections.{{ $index }}.content" placeholder="Kể về kỷ niệm..." ></textarea>
                                    @error("sections.{$index}.content")
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-span-12">
                                    <div class="flex gap-2">
                                        <button type="button" class="btn btn-primary" wire:click="updateSection({{ $index }})">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path d="M15.2 3a2 2 0 0 1 1.4.6l3.8 3.8a2 2 0 0 1 .6 1.4V19a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2z"/><path d="M17 21v-7a1 1 0 0 0-1-1H8a1 1 0 0 0-1 1v7M7 3v4a1 1 0 0 0 1 1h7"/></g></svg>
                                            Cập nhật
                                        </button>
                                        <button type="button" class="btn btn-danger" wire:click="deleteSection({{ $index }})" wire:confirm="Bạn có chắc chắn muốn xóa phần này?">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6h18m-2 0v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6m3 0V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2m-6 5v6m4-6v6"/></svg>
                                            Xóa
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    {{-- Add New Story Section Form --}}
    <div class="intro-y col-span-12 lg:col-span-12">
        <div class="intro-y box">
            <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60">
                <h2 class="font-medium text-base mr-auto">
                    Thêm câu chuyện mới
                </h2>
            </div>
            <form wire:submit.prevent="addSection">
                <div class="p-5">
                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-12 sm:col-span-6">
                            <label class="form-label">Tiêu đề *</label>
                            <input type="text" class="form-control" wire:model.defer="newSection.title" placeholder="VD: Lần đầu gặp gỡ">
                            @error('newSection.title')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label class="form-label">Vị trí</label>
                            <input type="number" class="form-control" wire:model.defer="newSection.position" placeholder="0">
                            @error('newSection.position')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label class="form-label">Ảnh</label>
                            <div class="mt-1">
                                <x-filepond::upload :key="$newImageResetKey" wire:model="newImage" :multiple="false" />
                            </div>
                            @error('newImage')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label class="form-label">Nội dung</label>
                            <textarea class="form-control" rows="4" wire:model.defer="newSection.content" placeholder="Kể về kỷ niệm..." ></textarea>
                            @error('newSection.content')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="px-5 pb-5">
                    <button type="submit" class="btn btn-primary" wire:loading.attr="disabled">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7-7v14"/></svg>
                        <span wire:loading.remove">Thêm</span>
                        <span wire:loading>Đang thêm...</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
