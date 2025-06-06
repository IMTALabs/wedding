<?php

namespace App\Livewire;

use App\Models\Wedding;
use App\Repositories\WeedingRepositories\WeedingRepository;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class GroomForm extends Component
{
    public Wedding $wedding;

    public string $groom_name = '';
    public $weedingRepository;
    public function __construct(WeedingRepository $weedingRepository)
    {
        $this->weedingRepository = $weedingRepository;
    }

    public function mount() {
        $userId = Auth::id();
        $this->wedding = $this->weedingRepository->getByUserId($userId);
    }
    public function render()
    {
        return view('livewire.groom-form');
    }
}
