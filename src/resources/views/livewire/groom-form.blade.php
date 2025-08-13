<div>
    @include('common.alert')

    <form wire:submit.prevent="save">
        <div class="grid grid-cols-12 gap-6 mt-5">
            <!-- Groom Information -->
            <div class="intro-y col-span-12 lg:col-span-6">
                <div class="intro-y box">
                    <div
                        class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                        <h2 class="font-medium text-base mr-auto">
                            Thông tin chú rể
                        </h2>
                    </div>
                    <div class="p-5">
                        <!-- Groom Name -->
                        <div class="input-form">
                            <label class="form-label w-full flex flex-col sm:flex-row">
                                Tên chú rể
                                <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Bắt buộc</span>
                            </label>
                            <input type="text" wire:model="groom_name"
                                class="form-control @error('groom_name') border-red-500 @enderror"
                                placeholder="Nhập tên chú rể">
                            @error('groom_name')
                                <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Groom Birthday -->
                        <div class="input-form mt-6">
                            <label class="form-label w-full flex flex-col sm:flex-row">
                                Ngày sinh
                                <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Không bắt buộc</span>
                            </label>
                            <input type="date" wire:model="groom_birthday"
                                class="form-control @error('groom_birthday') border-red-500 @enderror">
                            @error('groom_birthday')
                                <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Groom Image -->
                        <div class="input-form mt-6">
                            <label class="form-label w-full flex flex-col sm:flex-row">
                                Ảnh đại diện chú rể
                                <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Nên chọn ảnh tỉ lệ
                                    1:1</span>
                            </label>
                            <div class="flex items-start gap-2">
                                <x-filepond::upload wire:model="groom_image" class="grow" />
                                @error('groom_image')
                                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                                @enderror
                                <!-- Image Preview -->
                                @if($groom_image)
                                    <div>
                                        <img src="{{ $groom_image->temporaryUrl() }}"
                                            class="!size-24 object-cover object-top rounded-lg">
                                    </div>
                                @elseif($wedding->groom_image)
                                    <div>
                                        <img src="{{ asset('storage/' . $wedding->groom_image) }}"
                                            class="!size-24 object-cover rounded-lg cursor-pointer"
                                            onclick="showGroomImage()">
                                    </div>
                                    <!-- Groom Image Modal -->
                                    <div id="groom-image-modal" class="modal" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-body p-0">
                                                    <div class="p-5 text-center">
                                                        <img src="{{ asset('storage/' . $wedding->groom_image) }}"
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

                        <!-- Groom About -->
                        <div class="input-form mt-6">
                            <label class="form-label w-full flex flex-col sm:flex-row">
                                Giới thiệu về chú rể
                                <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Tối thiểu 10 ký tự</span>
                            </label>
                            <textarea wire:model="about_groom"
                                class="form-control @error('about_groom') border-red-500 @enderror"
                                placeholder="Giới thiệu về chú rể..." rows="4"></textarea>
                            @error('about_groom')
                                <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Groom Parents -->
                        <div class="input-form mt-6">
                            <label class="form-label w-full flex flex-col sm:flex-row">
                                Thông tin phụ huynh
                            </label>
                            <div class="form-inline">
                                <label class="form-label sm:w-20">Tên bố</label>
                                <input type="text" wire:model="groom_father"
                                    class="form-control @error('groom_father') border-red-500 @enderror"
                                    placeholder="Tên bố chú rể">
                            </div>
                            @error('groom_father')
                                <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                            @enderror

                            <div class="form-inline mt-4">
                                <label class="form-label sm:w-20">Tên mẹ</label>
                                <input type="text" wire:model="groom_mother"
                                    class="form-control @error('groom_mother') border-red-500 @enderror"
                                    placeholder="Tên mẹ chú rể">
                            </div>
                            @error('groom_mother')
                                <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bride Information -->
            <div class="intro-y col-span-12 lg:col-span-6">
                <div class="intro-y box">
                    <div
                        class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                        <h2 class="font-medium text-base mr-auto">
                            Thông tin cô dâu
                        </h2>
                    </div>
                    <div class="p-5">
                        <!-- Bride Name -->
                        <div class="input-form">
                            <label class="form-label w-full flex flex-col sm:flex-row">
                                Tên cô dâu
                                <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Bắt buộc</span>
                            </label>
                            <input type="text" wire:model="bride_name"
                                class="form-control @error('bride_name') border-red-500 @enderror"
                                placeholder="Nhập tên cô dâu">
                            @error('bride_name')
                                <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Bride Birthday -->
                        <div class="input-form mt-6">
                            <label class="form-label w-full flex flex-col sm:flex-row">
                                Ngày sinh
                                <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Không bắt buộc</span>
                            </label>
                            <input type="date" wire:model="bride_birthday"
                                class="form-control @error('bride_birthday') border-red-500 @enderror">
                            @error('bride_birthday')
                                <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Bride Image -->
                        <div class="input-form mt-6">
                            <label class="form-label w-full flex flex-col sm:flex-row">
                                Ảnh đại diện cô dâu
                                <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Nên chọn ảnh tỉ lệ
                                    1:1</span>
                            </label>
                            <div class="flex items-start gap-2">
                                <x-filepond::upload wire:model="bride_image" class="grow" />
                                @error('bride_image')
                                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                                @enderror

                                <!-- Image Preview -->
                                @if($bride_image)
                                    <div>
                                        <img src="{{ $bride_image->temporaryUrl() }}"
                                            class="!size-24 object-cover object-top rounded-lg">
                                    </div>
                                @elseif($wedding->bride_image)
                                    <div>
                                        <img src="{{ asset('storage/' . $wedding->bride_image) }}"
                                            class="!size-24 object-cover rounded-lg cursor-pointer"
                                            onclick="showBrideImage()">
                                    </div>

                                    <!-- Bride Image Modal -->
                                    <div id="bride-image-modal" class="modal" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-body p-0">
                                                    <div class="p-5 text-center">
                                                        <img src="{{ asset('storage/' . $wedding->bride_image) }}"
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

                        <!-- Bride About -->
                        <div class="input-form mt-6">
                            <label class="form-label w-full flex flex-col sm:flex-row">
                                Giới thiệu về cô dâu
                                <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Tối thiểu 10 ký tự</span>
                            </label>
                            <textarea wire:model="about_bride"
                                class="form-control @error('about_bride') border-red-500 @enderror"
                                placeholder="Giới thiệu về cô dâu..." rows="4"></textarea>
                            @error('about_bride')
                                <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Bride Parents -->
                        <div class="input-form mt-6">
                            <label class="form-label w-full flex flex-col sm:flex-row">
                                Thông tin phụ huynh
                            </label>
                            <div class="form-inline">
                                <label class="form-label sm:w-20">Tên bố</label>
                                <input type="text" wire:model="bride_father"
                                    class="form-control @error('bride_father') border-red-500 @enderror"
                                    placeholder="Tên bố cô dâu">
                            </div>
                            @error('bride_father')
                                <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                            @enderror

                            <div class="form-inline mt-4">
                                <label class="form-label sm:w-20">Tên mẹ</label>
                                <input type="text" wire:model="bride_mother"
                                    class="form-control @error('bride_mother') border-red-500 @enderror"
                                    placeholder="Tên mẹ cô dâu">
                            </div>
                            @error('bride_mother')
                                <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Wedding Date -->
        <div class="intro-y box mt-5">
            <div
                class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                <h2 class="font-medium text-base mr-auto">
                    Thông tin đám cưới
                </h2>
            </div>
            <div class="p-5">
                <div class="input-form">
                    <label class="form-label w-full flex flex-col sm:flex-row">
                        Ngày cưới
                        <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Không bắt buộc</span>
                    </label>
                    <input type="date" wire:model="wedding_date"
                        class="form-control @error('wedding_date') border-red-500 @enderror">
                    @error('wedding_date')
                        <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="mt-6">
            <button type="submit" class="btn btn-primary mr-2 mb-2" wire:loading.attr="disabled">
                <span wire:loading.remove>
                    Lưu thông tin
                </span>
                <span wire:loading>
                    Đang lưu...
                </span>
            </button>
        </div>
    </form>

    <!-- JavaScript for Image Modals -->
    <script>
        function showGroomImage() {
            const el = document.querySelector("#groom-image-modal");
            const modal = tailwind.Modal.getOrCreateInstance(el);
            modal.show();
        }

        function showBrideImage() {
            const el = document.querySelector("#bride-image-modal");
            const modal = tailwind.Modal.getOrCreateInstance(el);
            modal.show();
        }
    </script>
</div>