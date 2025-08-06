<?php

namespace App\Livewire;

use App\Models\Settings;
use App\Models\Wedding;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Spatie\LivewireFilepond\WithFilePond;

class Setting extends Component
{
    use WithFilePond;

    public $settings;

    // Form fields
    public $banner_image;
    public $wedding_countdown_date;
    public $website_url;
    public $template_id;
    public $background_music;
    public $animation_icon_type;
    public $animation_icon_height = 15;
    public $animation_icon_width = 15;
    public $show_names_and_wishes = true;
    public $show_money_box = true;
    public $play_background_music = true;
    public $show_animation = true;
    public $show_parents_names = true;

    // For existing banner image
    public $existing_banner_image;

    protected function rules()
    {
        return [
            'banner_image' => 'nullable',
            'wedding_countdown_date' => 'nullable|date',
            'website_url' => 'nullable|unique:weddings,website_url,'.$this->settings->id.'|string|max:100',
            'template_id' => 'nullable|numeric',
            'background_music' => 'nullable|string|max:100',
            'animation_icon_type' => 'nullable|string|max:100',
            'animation_icon_height' => 'nullable|numeric|min:1|max:100',
            'animation_icon_width' => 'nullable|numeric|min:1|max:100',
            'show_names_and_wishes' => 'boolean',
            'show_money_box' => 'boolean',
            'play_background_music' => 'boolean',
            'show_animation' => 'boolean',
            'show_parents_names' => 'boolean',
        ];
    }

    protected $messages = [
        'wedding_countdown_date.date' => 'Ngày đếm ngược phải là một ngày hợp lệ.',
        'website_url.max' => 'URL trang web không được quá 100 ký tự.',
        'template_id.numeric' => 'Template phải là một số.',
        'background_music.max' => 'Tên nhạc nền không được quá 100 ký tự.',
        'animation_icon_type.max' => 'Loại icon không được quá 100 ký tự.',
        'animation_icon_height.numeric' => 'Chiều cao icon phải là một số.',
        'animation_icon_height.min' => 'Chiều cao icon phải lớn hơn hoặc bằng 1.',
        'animation_icon_height.max' => 'Chiều cao icon không được quá 100.',
        'animation_icon_width.numeric' => 'Chiều rộng icon phải là một số.',
        'animation_icon_width.min' => 'Chiều rộng icon phải lớn hơn hoặc bằng 1.',
        'animation_icon_width.max' => 'Chiều rộng icon không được quá 100.',
    ];

    public function mount()
    {
        // Get the first settings record or create a new one if it doesn't exist
        $this->settings = Wedding::where('created_by', Auth::id())->first();
        if(!$this->settings) {
            return abort(404);
        }

        $this->initializeFormData();
    }

    public function initializeFormData()
    {
        $this->existing_banner_image = $this->settings->banner_image;
        $this->wedding_countdown_date = $this->settings->wedding_countdown_date ?
            \Carbon\Carbon::parse($this->settings->wedding_countdown_date)->format('Y-m-d') : '';
        $this->website_url = $this->settings->website_url ?? '';
        $this->template_id = $this->settings->template_id ?? null;
        $this->background_music = $this->settings->background_music ?? '';
        $this->animation_icon_type = $this->settings->animation_icon_type ?? '';
        $this->animation_icon_height = $this->settings->animation_icon_height ?? 15;
        $this->animation_icon_width = $this->settings->animation_icon_width ?? 15;
        $this->show_names_and_wishes = $this->settings->show_names_and_wishes ?? true;
        $this->show_money_box = $this->settings->show_money_box ?? true;
        $this->play_background_music = $this->settings->play_background_music ?? true;
        $this->show_animation = $this->settings->show_animation ?? true;
        $this->show_parents_names = $this->settings->show_parents_names ?? true;
    }

    public function save()
    {
        $this->validate();

        try {
            $updateData = [
                'wedding_countdown_date' => $this->wedding_countdown_date ?: null,
                'website_url' => $this->website_url,
                'template_id' => $this->template_id,
                'background_music' => $this->background_music,
                'animation_icon_type' => $this->animation_icon_type,
                'animation_icon_height' => $this->animation_icon_height,
                'animation_icon_width' => $this->animation_icon_width,
                'show_names_and_wishes' => $this->show_names_and_wishes,
                'show_money_box' => $this->show_money_box,
                'play_background_music' => $this->play_background_music,
                'show_animation' => $this->show_animation,
                'show_parents_names' => $this->show_parents_names,
            ];

            // Handle banner image upload
            if ($this->banner_image) {
                $bannerImagePath = $this->banner_image->store('settings/banner-images', 'public');
                $updateData['banner_image'] = $bannerImagePath;
            }

            // Update or create settings
            if ($this->settings->exists) {
                $this->settings->update($updateData);
            }

            session()->flash('success', 'Thiết lập đã được cập nhật thành công!');
            $this->dispatch('show-success-notification');

        } catch (\Exception $e) {
            session()->flash('error', 'Có lỗi xảy ra khi cập nhật thiết lập: ' . $e->getMessage());
            $this->dispatch('show-error-notification');
        }
    }

    public function render()
    {
        return view('livewire.setting');
    }
}
