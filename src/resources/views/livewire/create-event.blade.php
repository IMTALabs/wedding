<div class="modal-dialog">
    <div class="modal-header">
        <h2 class="font-medium text-base mr-auto">
            {{ $isEditing ? 'Chỉnh sửa sự kiện' : 'Thêm sự kiện mới' }}
        </h2>
    </div>
    <form wire:submit.prevent="save">
        <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
            <div class="col-span-12">
                <label for="event_name" class="form-label">Tên sự kiện</label>
                <input type="text" id="event_name" wire:model="event_name" class="form-control"
                    placeholder="Nhập tên sự kiện">
                @error('event_name') <div class="text-danger mt-2">{{ $message }}</div> @enderror
            </div>
            <div class="col-span-12">
                <label for="event_date" class="form-label">Ngày sự kiện</label>
                <input type="date" id="event_date" wire:model="event_date" class="form-control">
                @error('event_date') <div class="text-danger mt-2">{{ $message }}</div> @enderror
            </div>
            <div class="col-span-12">
                <label for="event_location" class="form-label">Địa điểm</label>
                <input type="text" id="event_location" wire:model="event_location" class="form-control"
                    placeholder="Nhập địa điểm">
                @error('event_location') <div class="text-danger mt-2">{{ $message }}</div> @enderror
            </div>
            <div class="col-span-12">
                <label for="description" class="form-label">Mô tả</label>
                <textarea id="description" wire:model="description" class="form-control" rows="3"
                    placeholder="Nhập mô tả sự kiện"></textarea>
                @error('description') <div class="text-danger mt-2">{{ $message }}</div> @enderror
            </div>
            <div class="col-span-12">
                <label for="link_embed" class="form-label">Link nhúng (nếu có)</label>
                <input type="text" id="link_embed" wire:model="link_embed" class="form-control"
                    placeholder="Nhập link nhúng">
                @error('link_embed') <div class="text-danger mt-2">{{ $message }}</div> @enderror
            </div>
        </div>
        <div class="modal-footer text-right">
            @if($isEditing)
                <button type="button" class="btn btn-outline-danger mr-1"
                    wire:click="deleteEvent({{ $eventId }})">Xóa</button>
            @endif
            <button type="button" class="btn btn-outline-secondary w-24 mr-1" wire:click="$dispatch('closeModal')">Hủy</button>
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
</div>