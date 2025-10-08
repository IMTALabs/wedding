<?php

namespace App\Livewire;

use App\Models\Bank;
use App\Models\Wedding;
use App\Models\WeddingGiftBox;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use Livewire\WithFileUploads;
use Mockery\Exception;
use Spatie\LivewireFilepond\WithFilePond;

class GiftBox extends Component
{
//    use WithFileUploads;
    use WithFilePond;

    public $giftBoxes = [];
    public $banks = [];

    public $type = '';
    public ?int $bank_id_groom = null;
    public ?int $bank_id_bride = null;
    public $bank_number_bride = '';
    public $bank_number_groom = '';
    public $image_qr_bride;
    public $image_qr_groom;
    public $name_bank_bride = '';
    public $name_bank_groom = '';
    public $gift_box_id_bride = null;
    public $gift_box_id_groom = null;
    public $old_image_qr_bride = null;
    public $old_image_qr_groom = null;
    public $weddingId;

    protected $rules = [
        'bank_id_bride' => 'nullable|exists:banks,id',
        'bank_id_groom' => 'nullable|exists:banks,id',
        'bank_number_bride' => 'nullable|string|max:30',
        'bank_number_groom' => 'nullable|string|max:30',
    ];

    protected $messages = [
        'bank_id_bride.exists' => 'Ngân hàng không hợp lệ.',
        'bank_id_groom.exists' => 'Ngân hàng không hợp lệ.',
        'bank_number_bride.max' => 'Số tài khoản không được quá 30 ký tự.',
        'bank_number_groom.max' => 'Số tài khoản không được quá 30 ký tự.',
        'name_bank_bride.max' => 'Tên chủ tài khoản không được quá 100 ký tự.',
        'name_bank_groom.max' => 'Tên chủ tài khoản không được quá 100 ký tự.',
    ];

    public function mount()
    {
        $this->weddingId = Wedding::where('created_by', Auth::id())->first()->id ?? null;
        $this->banks = Bank::all();
        $this->giftBoxes = WeddingGiftBox::where('wedding_id', $this->weddingId)->get() ?? [];
        if ($this->giftBoxes->isNotEmpty()) {
            foreach ($this->giftBoxes as $box) {
                if (in_array($box->type, ['bride', 'groom'])) {
                    $type = $box->type;

                    $this->{"bank_id_{$type}"} = $box->bank_id;
                    $this->{"bank_number_{$type}"} = $box->bank_number;
                    $this->{"name_bank_{$type}"} = $box->name;
                    $this->{"gift_box_id_{$type}"} = $box->id;
                    $this->{"old_image_qr_{$type}"} = $box->image_qr;
                }

                if (
                    isset($this->gift_box_id_bride, $this->gift_box_id_groom)
                ) {
                    break;
                }
            }
        }
    }

    public function save()
    {
        $this->validate();
        if (!$this->weddingId) return;
        try {
            foreach (['bride', 'groom'] as $type) {
                // Handle groom image upload
                if ($this->{"image_qr_{$type}"}) {
                    $path = $this->{"image_qr_{$type}"}->store('wedding/image_qr_' . $type, 'public');
                    $data['image_qr'] = $path;
                } else if (!$this->{"old_image_qr_{$type}"} && !$this->{"image_qr_{$type}"}) {
                    // validate nếu không có ảnh cũ và không có ảnh mới
                    $this->addError('image_qr_' . $type, 'Vui lòng tải lên mã QR ngân hàng cho ' . ($type === 'bride' ? 'cô dâu' : 'chú rể') . '.');
                    return;
                }
                $data = [
                    'wedding_id' => $this->weddingId,
                    'type' => $type,
                    'bank_id' => $this->{"bank_id_{$type}"},
                    'bank_number' => $this->{"bank_number_{$type}"},
                    'name' => $this->{"name_bank_{$type}"},
                ];

                if ($this->{"gift_box_id_{$type}"}) {
                    WeddingGiftBox::where('id', $this->{"gift_box_id_{$type}"})->update($data);
                } else {
                    WeddingGiftBox::create($data);
                }
                session()->flash('message', 'Gift box information updated successfully!');
                $this->resetForm();
                $this->refreshGiftBoxes();

            }
        } catch (Exception $e) {
            dd($e);
            session()->flash('error', 'An error occurred while saving gift box information.');
            return;
        }
    }

    public function refreshGiftBoxes()
    {
        $this->giftBoxes = WeddingGiftBox::where('wedding_id', $this->weddingId)->get() ?? [];
    }

    public function render()
    {
        return view('livewire.gift-box');
    }

    private function resetForm()
    {
        $this->type = '';
        $this->bank_id_groom = null;
        $this->bank_id_bride = null;
        $this->bank_number_bride = '';
        $this->bank_number_groom = '';
        $this->image_qr_bride = null;
        $this->image_qr_groom = null;
        $this->name_bank_bride = '';
        $this->name_bank_groom = '';
        $this->gift_box_id_bride = null;
        $this->gift_box_id_groom = null;
    }
}
