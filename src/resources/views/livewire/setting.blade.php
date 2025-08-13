<div>
    @include('common.alert')

    <form wire:submit.prevent="save">
        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="intro-y col-span-12 lg:col-span-12">
                <div class="intro-y box">
                    <div id="input" class="p-5">
                        <div class="preview grid grid-cols-12 gap-6">
                            <div class="input-form col-span-12 lg:col-span-12">
                                <label for="banner-image" class="form-label w-full flex flex-col sm:flex-row">
                                    Banner
                                    <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Bắt buộc, là ảnh</span>
                                </label>
                                <div class="flex items-start gap-4">
                                    <x-filepond::upload wire:model="banner_image" class="grow" />
                                    @error('banner_image')
                                        <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                                    @enderror
                                    <!-- Image Preview -->
                                    @if($banner_image)
                                        <div>
                                            <img src="{{ $banner_image->temporaryUrl() }}"
                                                class="w-full h-24 object-cover rounded-lg">
                                        </div>
                                    @elseif($existing_banner_image)
                                        <div>
                                            <img src="{{ asset('storage/' . $existing_banner_image) }}"
                                                class="w-full h-24 object-cover rounded-lg cursor-pointer"
                                                onclick="showBannerImage()">
                                        </div>
                                        <!-- Banner Image Modal -->
                                        <div id="banner-image-modal" class="modal" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-body p-0">
                                                        <div class="p-5 text-center">
                                                            <img src="{{ asset('storage/' . $existing_banner_image) }}"
                                                                class="w-full object-contain">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer text-right">
                                                        <button type="button" data-tw-dismiss="modal"
                                                            class="btn btn-outline-secondary w-20 mr-1">Đóng</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="input-form col-span-12 lg:col-span-3 mt-4">
                                <label for="wedding-countdown-date" class="form-label w-full flex flex-col sm:flex-row">
                                    Đếm ngược ngày cưới
                                </label>
                                <div class="relative w-full">
                                    <div
                                        class="absolute rounded-l w-10 h-full flex items-center justify-center bg-slate-100 border text-slate-500 dark:bg-darkmode-700 dark:border-darkmode-800 dark:text-slate-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path d="M8 2v4m8-4v4"/><rect width="18" height="18" x="3" y="4" rx="2"/><path d="M3 10h18"/></g></svg>
                                    </div>
                                    <input type="date" wire:model="wedding_countdown_date"
                                        class="form-control pl-12 @error('wedding_countdown_date') border-red-500 @enderror">
                                </div>
                                @error('wedding_countdown_date')
                                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="input-form col-span-12 lg:col-span-6 mt-4">
                                <label for="website-url" class="form-label w-full flex flex-col sm:flex-row">
                                    Đường dẫn trang web
                                </label>
                                <div class="input-group">
                                    <input type="text" wire:model="website_url"
                                        class="form-control @error('website_url') border-red-500 @enderror"
                                        placeholder="tienvan" aria-describedby="subdomain">
                                    <div id="subdomain" class="input-group-text">.{{ config('app.domain') }}</div>
                                </div>
                                @error('website_url')
                                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="input-form col-span-12 lg:col-span-3 mt-4">
                                <label for="template-id" class="form-label w-full flex flex-col sm:flex-row">
                                    Template
                                </label>
                                <div class="mt-2">
                                    <select wire:model="template_id"
                                        class="form-select @error('template_id') border-red-500 @enderror">
                                        <option value="">Chọn template</option>
                                        <option value="1">Leonardo DiCaprio</option>
                                        <option value="2">Johnny Deep</option>
                                        <option value="3">Robert Downey, Jr</option>
                                        <option value="4">Samuel L. Jackson</option>
                                        <option value="5">Morgan Freeman</option>
                                    </select>
                                </div>
                                @error('template_id')
                                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="input-form col-span-12 lg:col-span-12 mt-4">
                                <label for="background-music" class="form-label w-full flex flex-col sm:flex-row">
                                    Nhạc nền
                                </label>
                                <div class="grid grid-cols-12 gap-6 items-center">
                                    <div class="col-span-12 lg:col-span-3">
                                        <select wire:model="background_music"
                                            class="form-select @error('background_music') border-red-500 @enderror">
                                            <option value="">Chọn nhạc nền</option>
                                            <option value="1">Con đường tình yêu</option>
                                            <option value="2">Cơn mưa ngang qua</option>
                                            <option value="3">Thuyền quyên</option>
                                            <option value="4">Ánh nắng của anh</option>
                                            <option value="5">Marri me</option>
                                        </select>
                                        @error('background_music')
                                            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-span-12 lg:col-span-6">
                                        <audio controls class="w-full h-9">
                                            Your browser does not support the audio element.
                                        </audio>
                                    </div>
                                </div>
                            </div>
                            <div class="input-form col-span-12 lg:col-span-12 mt-4">
                                <label for="animation-icon-type" class="form-label w-full flex flex-col sm:flex-row">
                                    Animation icon rơi
                                </label>
                                <div class="grid grid-cols-12 gap-6 items-center">
                                    <div class="col-span-12 lg:col-span-3">
                                        <select wire:model="animation_icon_type"
                                            class="form-select @error('animation_icon_type') border-red-500 @enderror">
                                            <option value="">Chọn loại icon</option>
                                            <option value="1">Trái tim</option>
                                            <option value="2">Cánh hoa</option>
                                            <option value="3">Bông tuyết</option>
                                        </select>
                                        @error('animation_icon_type')
                                            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-span-3 lg:col-span-2">
                                        <div class="input-group">
                                            <input type="number" wire:model="animation_icon_height"
                                                class="form-control @error('animation_icon_height') border-red-500 @enderror"
                                                placeholder="15" aria-describedby="pxheight">
                                            <div id="pxheight" class="input-group-text">px(height)</div>
                                        </div>
                                        @error('animation_icon_height')
                                            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-span-3 lg:col-span-2">
                                        <div class="input-group">
                                            <input type="number" wire:model="animation_icon_width"
                                                class="form-control @error('animation_icon_width') border-red-500 @enderror"
                                                placeholder="15" aria-describedby="pxwidth">
                                            <div id="pxwidth" class="input-group-text">px(width)</div>
                                        </div>
                                        @error('animation_icon_width')
                                            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="input-form col-span-12 lg:col-span-12 mt-4">
                                <label>Ẩn/hiện cơ bản</label>
                                <div class="form-check mt-2">
                                    <input id="show-names-and-wishes" wire:model="show_names_and_wishes"
                                        class="form-check-input" type="checkbox">
                                    <label class="form-check-label" for="show-names-and-wishes">Hiển thị tên và lời
                                        chúc</label>
                                </div>
                                <div class="form-check mt-2">
                                    <input id="show-money-box" wire:model="show_money_box" class="form-check-input"
                                        type="checkbox">
                                    <label class="form-check-label" for="show-money-box">Hiển thị hộp mừng cưới</label>
                                </div>
                                <div class="form-check mt-2">
                                    <input id="play-background-music" wire:model="play_background_music"
                                        class="form-check-input" type="checkbox">
                                    <label class="form-check-label" for="play-background-music">Phát nhạc nền</label>
                                </div>
                                <div class="form-check mt-2">
                                    <input id="show-animation" wire:model="show_animation" class="form-check-input"
                                        type="checkbox">
                                    <label class="form-check-label" for="show-animation">Animation động icon rơi</label>
                                </div>
                                <div class="form-check mt-2">
                                    <input id="show-parents-names" wire:model="show_parents_names"
                                        class="form-check-input" type="checkbox">
                                    <label class="form-check-label" for="show-parents-names">Hiển thị tên phụ
                                        huynh</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="mt-6">
            <button type="submit" class="btn btn-primary mr-2 mb-2" wire:loading.attr="disabled">
                <span wire:loading.remove>
                    Lưu thiết lập
                </span>
                <span wire:loading>
                    Đang lưu...
                </span>
            </button>
        </div>
    </form>

    <!-- JavaScript for Banner Image Modal -->
    <script>
        function showBannerImage() {
            const el = document.querySelector("#banner-image-modal");
            const modal = tailwind.Modal.getOrCreateInstance(el);
            modal.show();
        }
    </script>
</div>