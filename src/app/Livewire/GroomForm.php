<?php

namespace App\Livewire;

use App\Models\Wedding;
use App\Repositories\WeddingRepositories\IWeddingRepository;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class GroomForm extends Component
{
    public Wedding $wedding;

    public string $groom_name = '';

    public $weddingRepository;

    public function mount(IWeddingRepository $weddingRepository)
    {
        $this->weddingRepository = $weddingRepository;

        $userId = Auth::id();
        $this->wedding = $this->weddingRepository->getByUserId($userId);
    }

    public function render()
    {
        return view('livewire.groom-form');
    }
}
