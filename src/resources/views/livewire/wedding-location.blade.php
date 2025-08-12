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

    {{-- Existing Locations --}}
    @if (count($locations) > 0)
        <div class="intro-y col-span-12 lg:col-span-12 mb-6">
            <div class="intro-y box">
                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60">
                    <h2 class="font-medium text-base mr-auto">
                        Danh sách địa điểm đã tạo
                    </h2>
                </div>
                <div class="p-5 space-y-4">
                    @foreach ($locations as $index => $location)
                        <div class="rounded-md">
                            <div class="grid grid-cols-12 gap-4">
                                <div class="col-span-12 sm:col-span-6">
                                    <label class="form-label">Tên địa điểm *</label>
                                    <input type="text" class="form-control" wire:model.defer="locations.{{ $index }}.name_location" placeholder="VD: Nhà hàng Sài Gòn Palace">
                                    @error("locations.{$index}.name_location") 
                                        <div class="text-danger mt-2">{{ $message }}</div> 
                                    @enderror
                                </div>
                                <div class="col-span-12 sm:col-span-6">
                                    <label class="form-label">Ngày giờ *</label>
                                    <input type="datetime-local" class="form-control" wire:model.defer="locations.{{ $index }}.date">
                                    @error("locations.{$index}.date") 
                                        <div class="text-danger mt-2">{{ $message }}</div> 
                                    @enderror
                                </div>
                                <div class="col-span-12 sm:col-span-6">
                                    <label class="form-label">Loại sự kiện *</label>
                                    <select class="form-select" wire:model.defer="locations.{{ $index }}.type">
                                        <option value="ceremony">Lễ cưới</option>
                                        <option value="reception">Tiệc cưới</option>
                                        <option value="bride_home">Nhà cô dâu</option>
                                        <option value="groom_home">Nhà chú rể</option>
                                        <option value="other">Khác</option>
                                    </select>
                                    @error("locations.{$index}.type") 
                                        <div class="text-danger mt-2">{{ $message }}</div> 
                                    @enderror
                                </div>
                                <div class="col-span-12 sm:col-span-6">
                                    <label class="form-label">Link địa điểm (Google Maps/...)</label>
                                    <input type="url" class="form-control" wire:model.defer="locations.{{ $index }}.link_embed" placeholder="https://maps.google.com/...">
                                    @error("locations.{$index}.link_embed") 
                                        <div class="text-danger mt-2">{{ $message }}</div> 
                                    @enderror
                                </div>
                                <div class="col-span-12">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" wire:model.defer="locations.{{ $index }}.is_hidden">
                                        <label class="form-check-label">Ẩn địa điểm này trên website</label>
                                    </div>
                                </div>
                                <div class="col-span-12">
                                    <div class="flex gap-2">
                                        <button type="button" class="btn btn-primary" wire:click="updateLocation({{ $index }})">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path d="M15.2 3a2 2 0 0 1 1.4.6l3.8 3.8a2 2 0 0 1 .6 1.4V19a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2z"/><path d="M17 21v-7a1 1 0 0 0-1-1H8a1 1 0 0 0-1 1v7M7 3v4a1 1 0 0 0 1 1h7"/></g></svg>
                                            Cập nhật
                                        </button>
                                        <button type="button" class="btn btn-danger" wire:click="deleteLocation({{ $index }})" wire:confirm="Bạn có chắc chắn muốn xóa địa điểm này?">
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

    {{-- Add New Location Form --}}
    <div class="intro-y col-span-12 lg:col-span-12">
        <div class="intro-y box">
            <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60">
                <h2 class="font-medium text-base mr-auto">
                    Thêm địa điểm mới
                </h2>
            </div>
            <form wire:submit.prevent="addLocation">
                <div class="p-5">
                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-12 sm:col-span-6">
                            <label class="form-label">Tên địa điểm *</label>
                            <input type="text" class="form-control" wire:model.defer="newLocation.name_location" placeholder="VD: Nhà hàng Sài Gòn Palace">
                            @error('newLocation.name_location') 
                                <div class="text-danger mt-2">{{ $message }}</div> 
                            @enderror
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label class="form-label">Ngày giờ *</label>
                            <input type="datetime-local" class="form-control" wire:model.defer="newLocation.date">
                            @error('newLocation.date') 
                                <div class="text-danger mt-2">{{ $message }}</div> 
                            @enderror
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label class="form-label">Loại sự kiện *</label>
                            <select class="form-select" wire:model.defer="newLocation.type">
                                <option value="ceremony">Lễ cưới</option>
                                <option value="reception">Tiệc cưới</option>
                                <option value="bride_home">Nhà cô dâu</option>
                                <option value="groom_home">Nhà chú rể</option>
                                <option value="other">Khác</option>
                            </select>
                            @error('newLocation.type') 
                                <div class="text-danger mt-2">{{ $message }}</div> 
                            @enderror
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label class="form-label">Link địa điểm (Google Maps/...)</label>
                            <input type="url" class="form-control" wire:model.defer="newLocation.link_embed" placeholder="https://maps.google.com/...">
                            @error('newLocation.link_embed') 
                                <div class="text-danger mt-2">{{ $message }}</div> 
                            @enderror
                        </div>
                        <div class="col-span-12">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" wire:model.defer="newLocation.is_hidden">
                                <label class="form-check-label">Ẩn địa điểm này trên website</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="px-5 pb-5">
                    <button type="submit" class="btn btn-primary" wire:loading.attr="disabled">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7-7v14"/></svg>
                        <span wire:loading.remove">Thêm địa điểm</span>
                        <span wire:loading>Đang thêm...</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
