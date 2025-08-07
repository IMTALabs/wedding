<div>
    <div class="px-2 py-2">
        {{-- Hiển thị thông báo thành công --}}
        @if (session()->has('success_album'))
            <div class="alert alert-success mb-2">
                {{ session('success_album') }}
            </div>
        @endif
        {{-- Hiển thị thông báo lỗi chung --}}
        @if (session()->has('error'))
            <div class="alert alert-danger mb-2">
                {{ session('error') }}
            </div>
        @endif
        <form wire:submit.prevent="save">
            <div class="text-slate-600 dark:text-slate-500 text-xs mt-3">
                <div>
                    <label for="post-form-1" class="form-label">Tên album</label>
                    <input id="post-form-1" type="text"
                           class="form-control w-full @error('album_name') rounded bg-red-500 @enderror"
                           wire:model="album_name"
                           placeholder="Nhập tên album">
                    @error('album_name')
                    <div class="text-red-500 mt-2">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mt-3">
                    <label for="post-form-2" class="form-label">Mô tả</label>
                    <textarea id="post-form-2"
                              class="form-control w-full @error('album_description') is-invalid @enderror"
                              rows="3"
                              wire:model="album_description"
                              placeholder="Nhập mô tả"></textarea>
                    @error('album_description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mt-3 flex justify-center">
                    <button type="submit" class="btn btn-primary ">Tạo mới</button>
                </div>
            </div>
        </form>
    </div>
</div>
