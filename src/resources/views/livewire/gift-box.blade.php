<div>
    @if (session()->has('message'))
        <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
            {{ session('message') }}
        </div>
    @endif

    <div class="grid grid-cols-12 gap-6 mt-5">
        <!-- Bride Gift Box -->
        <div class="intro-y col-span-12 lg:col-span-6">
            <div class="intro-y box">
                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60">
                    <h2 class="font-medium text-base mr-auto">Gift Box Cô Dâu</h2>
                </div>
                <form wire:submit.prevent="save" class="p-5">
                    <input type="hidden" wire:model="type" value="bride" />
                    <div class="input-form mb-4">
                        <label class="form-label">Ngân hàng <span class="text-xs text-slate-500">Bắt buộc</span></label>
                        <select wire:model="bankId" class="form-control @error('bankId') border-red-500 @enderror">
                            <option value="">Chọn ngân hàng</option>
                            @foreach($banks as $bank)
                                <option value="{{ $bank->id }}">{{ $bank->name }}</option>
                            @endforeach
                        </select>
                        @error('bankId') <div class="text-red-600 text-sm mt-1">{{ $message }}</div> @enderror
                    </div>
                    <div class="input-form mb-4">
                        <label class="form-label">Số tài khoản <span class="text-xs text-slate-500">Bắt buộc</span></label>
                        <input type="text" wire:model="bankNumber" class="form-control @error('bankNumber') border-red-500 @enderror" placeholder="Nhập số tài khoản">
                        @error('bankNumber') <div class="text-red-600 text-sm mt-1">{{ $message }}</div> @enderror
                    </div>
                    <div class="input-form mb-4">
                        <label class="form-label">Tên chủ tài khoản <span class="text-xs text-slate-500">Bắt buộc</span></label>
                        <input type="text" wire:model="name" class="form-control @error('name') border-red-500 @enderror" placeholder="Nhập tên chủ tài khoản">
                        @error('name') <div class="text-red-600 text-sm mt-1">{{ $message }}</div> @enderror
                    </div>
                    <div class="input-form mb-4">
                        <label class="form-label">Ảnh QR</label>
                        <input type="file" wire:model="imageQr" class="form-control @error('imageQr') border-red-500 @enderror">
                        @error('imageQr') <div class="text-red-600 text-sm mt-1">{{ $message }}</div> @enderror
                        @if($imageQr)
                            <div class="mt-2">
                                <img src="{{ $imageQr->temporaryUrl() }}" class="h-24 w-24 object-cover rounded">
                            </div>
                        @elseif(isset($giftBoxes) && $giftBoxes->where('type','bride')->first()?->image_qr)
                            <div class="mt-2">
                                <img src="{{ Storage::url($giftBoxes->where('type','bride')->first()->image_qr) }}" class="h-24 w-24 object-cover rounded">
                            </div>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Lưu thông tin cô dâu</button>
                </form>
            </div>
        </div>

        <!-- Groom Gift Box -->
        <div class="intro-y col-span-12 lg:col-span-6">
            <div class="intro-y box">
                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60">
                    <h2 class="font-medium text-base mr-auto">Gift Box Chú Rể</h2>
                </div>
                <form wire:submit.prevent="save" class="p-5">
                    <input type="hidden" wire:model="type" value="groom" />
                    <div class="input-form mb-4">
                        <label class="form-label">Ngân hàng <span class="text-xs text-slate-500">Bắt buộc</span></label>
                        <select wire:model="bankId" class="form-control @error('bankId') border-red-500 @enderror">
                            <option value="">Chọn ngân hàng</option>
                            @foreach($banks as $bank)
                                <option value="{{ $bank->id }}">{{ $bank->name }}</option>
                            @endforeach
                        </select>
                        @error('bankId') <div class="text-red-600 text-sm mt-1">{{ $message }}</div> @enderror
                    </div>
                    <div class="input-form mb-4">
                        <label class="form-label">Số tài khoản <span class="text-xs text-slate-500">Bắt buộc</span></label>
                        <input type="text" wire:model="bankNumber" class="form-control @error('bankNumber') border-red-500 @enderror" placeholder="Nhập số tài khoản">
                        @error('bankNumber') <div class="text-red-600 text-sm mt-1">{{ $message }}</div> @enderror
                    </div>
                    <div class="input-form mb-4">
                        <label class="form-label">Tên chủ tài khoản <span class="text-xs text-slate-500">Bắt buộc</span></label>
                        <input type="text" wire:model="name" class="form-control @error('name') border-red-500 @enderror" placeholder="Nhập tên chủ tài khoản">
                        @error('name') <div class="text-red-600 text-sm mt-1">{{ $message }}</div> @enderror
                    </div>
                    <div class="input-form mb-4">
                        <label class="form-label">Ảnh QR</label>
                        <input type="file" wire:model="imageQr" class="form-control @error('imageQr') border-red-500 @enderror">
                        @error('imageQr') <div class="text-red-600 text-sm mt-1">{{ $message }}</div> @enderror
                        @if($imageQr)
                            <div class="mt-2">
                                <img src="{{ $imageQr->temporaryUrl() }}" class="h-24 w-24 object-cover rounded">
                            </div>
                        @elseif(isset($giftBoxes) && $giftBoxes->where('type','groom')->first()?->image_qr)
                            <div class="mt-2">
                                <img src="{{ Storage::url($giftBoxes->where('type','groom')->first()->image_qr) }}" class="h-24 w-24 object-cover rounded">
                            </div>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Lưu thông tin chú rể</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Gift Box List -->
    <div class="mt-8">
        <h2 class="text-lg font-semibold mb-2">Danh sách Gift Box</h2>
        <table class="w-full border">
            <thead>
                <tr>
                    <th class="border px-2 py-1">Loại</th>
                    <th class="border px-2 py-1">Ngân hàng</th>
                    <th class="border px-2 py-1">Số tài khoản</th>
                    <th class="border px-2 py-1">Tên chủ TK</th>
                    <th class="border px-2 py-1">QR</th>
                    <th class="border px-2 py-1">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach($giftBoxes as $box)
                    <tr>
                        <td class="border px-2 py-1">{{ ucfirst($box->type) }}</td>
                        <td class="border px-2 py-1">{{ $box->bank->name ?? '' }}</td>
                        <td class="border px-2 py-1">{{ $box->bank_number }}</td>
                        <td class="border px-2 py-1">{{ $box->name }}</td>
                        <td class="border px-2 py-1">
                            @if($box->image_qr)
                                <img src="{{ Storage::url($box->image_qr) }}" alt="QR" class="h-12 w-12 object-cover rounded" />
                            @endif
                        </td>
                        <td class="border px-2 py-1">
                            <button wire:click="edit({{ $box->id }})" class="bg-yellow-500 text-white px-2 py-1 rounded">Sửa</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
