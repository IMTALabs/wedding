<?php

namespace App\Livewire;

use App\Models\Bank;
use App\Models\Wedding;
use App\Models\WeddingGiftBox;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class GiftBox extends Component
{
    use WithFileUploads;

    public $giftBoxes = [];
    public $banks = [];

    public $type = '';
	public $bankId = '';
    public $bankName = '';
    public $bankNumber = '';
    public $name = '';
    public $imageQr;
    public $editingId = null;

    protected function rules()
    {
        return [
            'type' => 'required|in:bride,groom',
            'bankNumber' => 'required|string|max:30',
            'name' => 'required|string|max:100',
	        'bankId' => 'nullable|exists:banks,id',
            'imageQr' => 'nullable|image|max:2048',
        ];
    }

    public function mount()
    {
        $weddingId = Wedding::where('created_by', Auth::id())->first()->id ?? null;
		$this->banks = Bank::all();
        $this->giftBoxes = WeddingGiftBox::where('wedding_id', $weddingId)->get() ?? [];
    }

    public function save()
    {
        $this->validate();

        $weddingId = Wedding::where('created_by', Auth::id())->first()->id ?? null;
        if (!$weddingId) return;

        $data = [
            'wedding_id' => $weddingId,
            'type' => $this->type,
            'bank_number' => $this->bankNumber,
            'name' => $this->name,
            'bank_id' => $this->bankId,
        ];

        if ($this->imageQr) {
            $data['image_qr'] = $this->imageQr->store('gift_box_qr', 'public');
        }

        WeddingGiftBox::updateOrCreate(
            [
                'wedding_id' => $weddingId,
                'type' => $this->type,
            ],
            $data
        );

        session()->flash('message', 'Gift box information updated successfully!');
        $this->resetForm();
        $this->refreshGiftBoxes();
    }

    public function edit($id)
    {
        $box = WeddingGiftBox::find($id);
        if ($box) {
            $this->editingId = $box->id;
            $this->type = $box->type;
            $this->bankId = $box->bank_id;
            $this->bankNumber = $box->bank_number;
            $this->name = $box->name;
            $this->imageQr = null;
        }
    }

    public function resetForm()
    {
        $this->editingId = null;
        $this->type = '';
        $this->bankName = '';
        $this->bankNumber = '';
        $this->name = '';
        $this->imageQr = null;
        $this->resetValidation();
    }

    public function refreshGiftBoxes()
    {
        $weddingId = Wedding::where('created_by', Auth::id())->first()->id ?? null;
        $this->giftBoxes = WeddingGiftBox::where('wedding_id', $weddingId)->get() ?? [];
    }

    public function render()
    {
        return view('livewire.gift-box');
    }
}
