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

    <div class="intro-y col-span-12 lg:col-span-12">
        <div class="intro-y box">
            <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60">
                <h2 class="font-medium text-base mr-auto">
                    Thông báo chung
                </h2>
            </div>
            <form wire:submit.prevent="save">
                <div class="p-5">
                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-12">
                            <label class="form-label">Nội dung thông báo *</label>
                            <textarea class="form-control" rows="4" wire:model.defer="message" placeholder="Nhập nội dung thông báo (ví dụ: Lịch cưới thay đổi vào ngày..., vui lòng...)" ></textarea>
                            @error('message')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-12">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" wire:model.defer="is_active">
                                <label class="form-check-label">Hiển thị thông báo trên website</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="px-5 pb-5 flex gap-2">
                    <button type="submit" class="btn btn-primary" wire:loading.delay.attr="disabled">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7-7v14"/></svg>
                        <span wire:loading.delay.remove>Lưu thông báo</span>
                        <span wire:loading.delay>Đang lưu...</span>
                    </button>
                    @if($notificationId)
                        <button type="button" class="btn btn-secondary" wire:click="toggleActive" wire:loading.delay.attr="disabled">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path d="m2 12l9 9 11-18"/></g></svg>
                            {{ $is_active ? 'Ẩn thông báo' : 'Hiển thị thông báo' }}
                        </button>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>
