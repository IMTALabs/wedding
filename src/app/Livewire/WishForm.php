<?php

namespace App\Livewire;

use App\Models\RsvpForm;
use App\Models\Wedding;
use Illuminate\Support\Arr;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class WishForm extends Component
{
    public int $weddingId;
    public string $name = '';
    public string $wish = '';

    protected array $rules = [
        'name' => 'required|string|max:255',
        'wish' => 'required|string|max:1000',
    ];

    protected array $messages = [
        'name.required' => 'Tên của bạn là bắt buộc.',
        'name.string' => 'Tên của bạn phải là một chuỗi ký tự.',
        'name.max' => 'Tên của bạn không được vượt quá 255 ký tự.',
        'wish.required' => 'Lời chúc là bắt buộc.',
        'wish.string' => 'Lời chúc phải là một chuỗi ký tự.',
        'wish.max' => 'Lời chúc không được vượt quá 1000 ký tự.',
    ];

    public function mount(int $weddingId): void
    {
        $this->weddingId = $weddingId;
    }

    public function render()
    {
        return view('livewire.wish-form');
    }

    public function submit(): void
    {
        try {
            $this->validate();
        } catch (ValidationException $exception) {
            $firstFieldWithError = Arr::first(array_keys($exception->validator->errors()->messages()));

            if ($firstFieldWithError) {
                $this->dispatch('wish-validation-error', field: $firstFieldWithError);
            }

            throw $exception;
        }

        $wedding = Wedding::find($this->weddingId);

        if (!$wedding) {
            $this->addError('wedding', 'Đám cưới không tồn tại.');
            $this->dispatch('wish-validation-error', field: 'name');
            return;
        }

        RsvpForm::create([
            'wedding_id' => $wedding->id,
            'guest_name' => $this->name,
            'guest_message' => $this->wish,
        ]);

        $this->reset(['name', 'wish']);
        $this->resetValidation();

        $this->dispatch('wish-submitted', message: 'Đã gửi thành công. Chúng tôi rất trân trọng những lời chúc này!');
    }
}
