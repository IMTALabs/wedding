<div class="row animate-box" data-wish-form wire:ignore>
    <div class="col-md-10 col-md-offset-1">
        <form class="form-inline row" wire:submit.prevent="submit" novalidate>
            <div class="col-12">
                <div class="form-group w-100">
                    <label for="wishName" class="sr-only">Tên</label>
                    <input
                        type="text"
                        id="wishName"
                        name="name"
                        wire:model.defer="name"
                        data-wish-field="name"
                        @class(['form-control', 'scroll-errors' => $errors->has('name')])
                        placeholder="Tên để cô dâu chú rể nhận ra bạn"
                        autocomplete="name"
                    >
                    @error('name')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-12">
                <div class="form-group w-100">
                    <label for="wishMessage" class="sr-only">Lời chúc</label>
                    <textarea
                        id="wishMessage"
                        name="wish"
                        rows="5"
                        wire:model.defer="wish"
                        data-wish-field="wish"
                        @class(['form-control', 'scroll-errors' => $errors->has('wish')])
                        placeholder="Lời chúc từ bạn"
                    ></textarea>
                    @error('wish')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-12">
                <button
                    type="submit"
                    class="btn btn-default btn-block d-flex justify-content-center align-items-center gap-2"
                    wire:loading.attr="disabled"
                    wire:target="submit"
                >
                    <span wire:loading.remove wire:target="submit">Gửi lời chúc</span>
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" wire:loading wire:target="submit"></span>
                </button>
            </div>
        </form>
    </div>
</div>
