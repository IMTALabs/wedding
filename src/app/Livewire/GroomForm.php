<?php

namespace App\Livewire;

use App\Models\Wedding;
use App\Repositories\WeddingRepositories\IWeddingRepository;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class GroomForm extends Component
{
    use WithFileUploads;

    public Wedding $wedding;

    // Groom properties
    public string $groom_name = '';
    public string $groom_birthday = '';
    public $groom_image;
    public string $about_groom = '';
    public string $groom_father = '';
    public string $groom_mother = '';

    // Bride properties
    public string $bride_name = '';
    public string $bride_birthday = '';
    public $bride_image;
    public string $about_bride = '';
    public string $bride_father = '';
    public string $bride_mother = '';

    // Wedding properties
    public string $wedding_date = '';

    protected $rules = [
        'groom_name' => 'required|string|max:100',
        'groom_birthday' => 'nullable|date|before:today',
        'groom_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        'about_groom' => 'nullable|string|min:10|max:1000',
        'groom_father' => 'nullable|string|max:100',
        'groom_mother' => 'nullable|string|max:100',
        
        'bride_name' => 'required|string|max:100',
        'bride_birthday' => 'nullable|date|before:today',
        'bride_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        'about_bride' => 'nullable|string|min:10|max:1000',
        'bride_father' => 'nullable|string|max:100',
        'bride_mother' => 'nullable|string|max:100',
        
        'wedding_date' => 'nullable|date|after_or_equal:today',
    ];

    protected $messages = [
        'groom_name.required' => 'Tên chú rể là bắt buộc.',
        'groom_name.max' => 'Tên chú rể không được quá 100 ký tự.',
        'groom_birthday.date' => 'Ngày sinh chú rể phải là một ngày hợp lệ.',
        'groom_birthday.before' => 'Ngày sinh chú rể phải trước ngày hôm nay.',
        'groom_image.image' => 'File ảnh chú rể phải là hình ảnh.',
        'groom_image.mimes' => 'Ảnh chú rể phải có định dạng: jpeg, png, jpg, gif.',
        'groom_image.max' => 'Ảnh chú rể không được lớn hơn 2MB.',
        'about_groom.min' => 'Giới thiệu về chú rể phải ít nhất 10 ký tự.',
        'about_groom.max' => 'Giới thiệu về chú rể không được quá 1000 ký tự.',
        
        'bride_name.required' => 'Tên cô dâu là bắt buộc.',
        'bride_name.max' => 'Tên cô dâu không được quá 100 ký tự.',
        'bride_birthday.date' => 'Ngày sinh cô dâu phải là một ngày hợp lệ.',
        'bride_birthday.before' => 'Ngày sinh cô dâu phải trước ngày hôm nay.',
        'bride_image.image' => 'File ảnh cô dâu phải là hình ảnh.',
        'bride_image.mimes' => 'Ảnh cô dâu phải có định dạng: jpeg, png, jpg, gif.',
        'bride_image.max' => 'Ảnh cô dâu không được lớn hơn 2MB.',
        'about_bride.min' => 'Giới thiệu về cô dâu phải ít nhất 10 ký tự.',
        'about_bride.max' => 'Giới thiệu về cô dâu không được quá 1000 ký tự.',
        
        'wedding_date.date' => 'Ngày cưới phải là một ngày hợp lệ.',
        'wedding_date.after_or_equal' => 'Ngày cưới phải từ hôm nay trở đi.',
    ];

    public function mount(IWeddingRepository $weddingRepository)
    {
        $userId = Auth::id();
        $this->wedding = $weddingRepository->getByUserId($userId);
        
        // Initialize properties with existing data
        $this->initializeFormData();
    }

    public function initializeFormData()
    {
        $this->groom_name = $this->wedding->groom_name ?? '';
        $this->groom_birthday = $this->wedding->groom_birthday ? 
            \Carbon\Carbon::parse($this->wedding->groom_birthday)->format('Y-m-d') : '';
        $this->about_groom = $this->wedding->about_groom ?? '';
        $this->groom_father = $this->wedding->groom_father ?? '';
        $this->groom_mother = $this->wedding->groom_mother ?? '';
        
        $this->bride_name = $this->wedding->bride_name ?? '';
        $this->bride_birthday = $this->wedding->bride_birthday ? 
            \Carbon\Carbon::parse($this->wedding->bride_birthday)->format('Y-m-d') : '';
        $this->about_bride = $this->wedding->about_bride ?? '';
        $this->bride_father = $this->wedding->bride_father ?? '';
        $this->bride_mother = $this->wedding->bride_mother ?? '';
        
        $this->wedding_date = $this->wedding->wedding_date ? 
            \Carbon\Carbon::parse($this->wedding->wedding_date)->format('Y-m-d') : '';
    }

    public function save()
    {
        $this->validate();
        
        try {
            $updateData = [
                'groom_name' => $this->groom_name,
                'groom_birthday' => $this->groom_birthday ?: null,
                'about_groom' => $this->about_groom,
                'groom_father' => $this->groom_father,
                'groom_mother' => $this->groom_mother,
                
                'bride_name' => $this->bride_name,
                'bride_birthday' => $this->bride_birthday ?: null,
                'about_bride' => $this->about_bride,
                'bride_father' => $this->bride_father,
                'bride_mother' => $this->bride_mother,
                
                'wedding_date' => $this->wedding_date ?: null,
            ];

            // Handle groom image upload
            if ($this->groom_image) {
                $groomImagePath = $this->groom_image->store('wedding/groom-images', 'public');
                $updateData['groom_image'] = $groomImagePath;
            }

            // Handle bride image upload
            if ($this->bride_image) {
                $brideImagePath = $this->bride_image->store('wedding/bride-images', 'public');
                $updateData['bride_image'] = $brideImagePath;
            }

            $this->wedding->update($updateData);

            session()->flash('success', 'Thông tin cưới đã được cập nhật thành công!');
            $this->dispatch('show-success-notification');
            
        } catch (\Exception $e) {
            session()->flash('error', 'Có lỗi xảy ra khi cập nhật thông tin: ' . $e->getMessage());
            $this->dispatch('show-error-notification');
        }
    }

    public function render()
    {
        return view('livewire.groom-form');
    }
}
