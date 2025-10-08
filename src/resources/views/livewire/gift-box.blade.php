<div>
    @if (session()->has('success_gift_box'))
        <div class="alert alert-success mb-2">
            {{ session('success_gift_box') }}
        </div>
    @endif
    {{-- Hiển thị thông báo lỗi chung --}}
    @if (session()->has('error'))
        <div class="alert alert-danger mb-2">
            {{ session('error') }}
        </div>
    @endif
    <form wire:submit.prevent="save">
        <div class="grid grid-cols-12 gap-6 mt-5">
            <!-- Bride Gift Box -->
            <div class="intro-y col-span-12 lg:col-span-6">
                <div class="intro-y box">
                    <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60">
                        <h2 class="font-medium text-base mr-auto">Gift Box Cô Dâu</h2>
                    </div>
                    <div class="p-5">
                        <input type="hidden" wire:model="type" value="bride"/>
                        <div class="input-form mb-4">
                            <label class="form-label w-full flex flex-col sm:flex-row">Ngân hàng <span
                                    class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Không bắt buộc</span></label>
                            <select data-placeholder="Chọn ngân hàng" wire:model="bank_id_bride"
                                    class="tom-select form-control @error('bank_id_bride') border-red-500 @enderror">
                                <option value=""></option>
                                @foreach($banks as $bank)
                                    <option @if($bank->id == $bank_id_bride) selected
                                            @endif value="{{ $bank->id }}">{{ $bank->name }}</option>
                                @endforeach
                            </select>
                            @error('bank_id_bride')
                            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="input-form mb-4">
                            <label class="form-label w-full flex flex-col sm:flex-row">Số tài khoản <span
                                    class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Không bắt buộc</span></label>
                            <input type="text" wire:model="bank_number_bride"
                                   class="form-control @error('bank_number_bride') border-red-500 @enderror"
                                   placeholder="Nhập số tài khoản">
                            @error('bank_number_bride')
                            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="input-form mb-4">
                            <label class="form-label w-full flex flex-col sm:flex-row">Tên chủ tài khoản <span
                                    class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Không bắt buộc</span></label>
                            <input type="text" wire:model="name_bank_bride"
                                   class="form-control @error('name_bank_bride') border-red-500 @enderror"
                                   placeholder="Nhập tên chủ tài khoản">
                            @error('name_bank_bride')
                            <div class="text-red-600 text-sm mt-1">{{ $message }}</div> @enderror
                        </div>
                        <div class="input-form mb-4">
                            <label class="form-label w-full flex flex-col sm:flex-row">Ảnh QR <span
                                    class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Bắt buộc</span></label>
                            <div class="flex items-start gap-2">
                                <x-filepond::upload wire:model="image_qr_bride" class="grow"/>
                                @error('image_qr_bride')
                                <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                                @enderror
                                <!-- Image Preview -->
                                @if($image_qr_bride)
                                    <div>
                                        <img src="{{ $image_qr_bride->temporaryUrl() }}"
                                             class="!size-24 object-cover object-top rounded-lg">
                                    </div>
                                @elseif($old_image_qr_bride)
                                    <div>
                                        <img src="{{ asset('storage/' . $old_image_qr_bride) }}"
                                             class="!size-24 object-cover rounded-lg cursor-pointer"
                                             onclick="showQRBrideImage()">
                                    </div>
                                    <div id="bride-image-modal" class="modal" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-body p-0">
                                                    <div class="p-5 text-center">
                                                        <img
                                                            src="{{ asset('storage/' . $old_image_qr_bride) }}"
                                                            class="w-full object-contain">
                                                    </div>
                                                </div>
                                                <div class="modal-footer text-right">
                                                    <button type="button" data-tw-dismiss="modal"
                                                            class="btn btn-outline-secondary w-20 mr-1">Đóng
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Groom Gift Box -->
            <div class="intro-y col-span-12 lg:col-span-6">
                <div class="intro-y box">
                    <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60">
                        <h2 class="font-medium text-base mr-auto">Gift Box Chú Rể</h2>
                    </div>
                    <div class="p-5">
                        <input type="hidden" wire:model="type" value="groom"/>
                        <div class="input-form mb-4">
                            <label class="form-label w-full flex flex-col sm:flex-row">Ngân hàng <span
                                    class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Không bắt buộc</span></label>
                            <select data-placeholder="Chọn ngân hàng" wire:model="bank_id_groom"
                                    class="tom-select form-control @error('bank_id_groom') border-red-500 @enderror">
                                <option value=""></option>
                                @foreach($banks as $bank)
                                    <option @if($bank->id == $bank_id_groom) selected
                                            @endif value="{{ $bank->id }}">{{ $bank->name }}</option>
                                @endforeach
                            </select>
                            @error('bank_id_groom')
                            <div class="text-red-600 text-sm mt-1">{{ $message }}</div> @enderror
                        </div>
                        <div class="input-form mb-4">
                            <label class="form-label w-full flex flex-col sm:flex-row">Số tài khoản <span
                                    class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Không bắt buộc</span></label>
                            <input type="text" wire:model="bank_number_groom"
                                   class="form-control @error('bank_number_groom') border-red-500 @enderror"
                                   placeholder="Nhập số tài khoản">
                            @error('bank_number_groom')
                            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="input-form mb-4">
                            <label class="form-label w-full flex flex-col sm:flex-row">Tên chủ tài khoản <span
                                    class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Không bắt buộc</span></label>
                            <input type="text" wire:model="name_bank_groom"
                                   class="form-control @error('name_bank_groom') border-red-500 @enderror"
                                   placeholder="Nhập tên chủ tài khoản">
                            @error('name_bank_groom')
                            <div class="text-red-600 text-sm mt-1">{{ $message }}</div> @enderror
                        </div>
                        <div class="input-form mb-4">
                            <label class="form-label w-full flex flex-col sm:flex-row">Ảnh QR <span
                                    class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Bắt buộc</span></label>
                            <div class="flex items-start gap-2">
                                <x-filepond::upload wire:model="image_qr_groom" class="grow"/>
                                @error('image_qr_groom')
                                <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                                @enderror
                                <!-- Image Preview -->
                                @if($image_qr_groom)
                                    <div>
                                        <img src="{{ $image_qr_groom->temporaryUrl() }}"
                                             class="!size-24 object-cover object-top rounded-lg">
                                    </div>
                                @elseif($old_image_qr_groom)
                                    <div>
                                        <img src="{{ asset('storage/' . $old_image_qr_groom) }}"
                                             class="!size-24 object-cover rounded-lg cursor-pointer"
                                             onclick="showQRGroomImage()">
                                    </div>
                                    <div id="groom-image-modal" class="modal" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-body p-0">
                                                    <div class="p-5 text-center">
                                                        <img
                                                            src="{{ asset('storage/' . $old_image_qr_groom) }}"
                                                            class="w-full object-contain">
                                                    </div>
                                                </div>
                                                <div class="modal-footer text-right">
                                                    <button type="button" data-tw-dismiss="modal"
                                                            class="btn btn-outline-secondary w-20 mr-1">Đóng
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
    <script>
        function showQRGroomImage() {
            const el = document.querySelector("#groom-image-modal");
            const modal = tailwind.Modal.getOrCreateInstance(el);
            modal.show();
        }

        function showQRBrideImage() {
            const el = document.querySelector("#bride-image-modal");
            const modal = tailwind.Modal.getOrCreateInstance(el);
            modal.show();
        }
    </script>
</div>
