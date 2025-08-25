<?php

namespace App\Livewire;

use App\Models\StorySection;
use App\Models\Wedding;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Spatie\LivewireFilepond\WithFilePond;

class LoveStory extends Component
{
    use WithFilePond;
    public $weddingId;
    public $sections = [];
    public $newSection = [
        'title' => '',
        'content' => '',
        'position' => 0,
        'timeline' => null
    ];
    // FilePond temporary upload (single file) for new section
    public $newImage = null;
    // FilePond uploads for updating existing section images (indexed by section index)
    public $sectionImages = [];
    // Keys to force input reset on frontend (if needed)
    public $newImageResetKey = 0;
    public $sectionImageResetKey = 0;

    protected $rules = [
        'sections.*.title' => 'required|string|max:255',
        'sections.*.content' => 'nullable|string',
        'sections.*.position' => 'nullable|integer|min:0',
        'sections.*.image' => 'nullable|string|max:255',
        'newSection.title' => 'required|string|max:255',
        'newSection.content' => 'nullable|string',
        'newSection.position' => 'nullable|integer|min:0',
        'newImage' => 'nullable', // handled manually; can add image validation if needed
        'sectionImages.*' => 'nullable',
    ];

    protected $messages = [
        'sections.*.title.required' => 'Tiêu đề là bắt buộc.',
        'sections.*.title.max' => 'Tiêu đề quá dài.',
        'newSection.title.required' => 'Tiêu đề là bắt buộc.',
        'sections.*.position.integer' => 'Vị trí phải là số.',
        'newSection.position.integer' => 'Vị trí phải là số.',
    ];

    public function mount()
    {
        $wedding = Wedding::where('created_by', Auth::id())->first();
        if (!$wedding) {
            session()->flash('error', 'Không tìm thấy thông tin đám cưới.');
            return;
        }
        $this->weddingId = $wedding->id;
        $this->loadSections();
    }

    public function loadSections()
    {
        if (!$this->weddingId) {
            return;
        }

        $sections = StorySection::where('wedding_id', $this->weddingId)
            ->orderBy('position')
            ->get();

        $this->sections = $sections->map(function ($section) {
            return [
                'id' => $section->id,
                'title' => $section->title,
                'content' => $section->content,
                'position' => $section->position,
                'image' => $section->image,
                'timeline' => $section->timeline ? \Carbon\Carbon::parse($section->timeline)->format('Y-m-d') : null,
            ];
        })->toArray();

        $this->sectionImages = array_fill(0, count($this->sections), null);
    }

    public function addSection()
    {
        $this->validate([
            'newSection.title' => 'required|string|max:255',
            'newSection.content' => 'nullable|string',
            'newSection.position' => 'nullable|integer|min:0',
        ]);

        $imagePath = null;
        if ($this->newImage && method_exists($this->newImage, 'store')) {
            $imagePath = $this->newImage->store('story_sections', 'public');
        }

        StorySection::create([
            'wedding_id' => $this->weddingId,
            'title' => $this->newSection['title'],
            'content' => $this->newSection['content'],
            'position' => $this->newSection['position'] ?? 0,
            'image' => $imagePath,
            'timeline' => $this->newSection['timeline'] ?? null,
        ]);

        $this->newSection = [
            'title' => '',
            'content' => '',
            'position' => 0,
            'timeline' => null,
        ];
        $this->newImage = null;
        $this->newImageResetKey++;

        $this->loadSections();
        $this->dispatch('filepond-reset-newImage');
        session()->flash('success', 'Đã thêm câu chuyện mới.');
    }

    public function updateSection($index)
    {
        $this->validate([
            "sections.{$index}.title" => 'required|string|max:255',
            "sections.{$index}.content" => 'nullable|string',
            "sections.{$index}.position" => 'nullable|integer|min:0',
            "sections.{$index}.image" => 'nullable|string|max:255',
        ]);

        $section = StorySection::find($this->sections[$index]['id']);
        if ($section) {
            $data = [
                'title' => $this->sections[$index]['title'],
                'content' => $this->sections[$index]['content'],
                'position' => $this->sections[$index]['position'],
                'image' => $this->sections[$index]['image'],
                'timeline' => $this->sections[$index]['timeline'] ?? null,
            ];

            $sectionFile = null;
            if (array_key_exists($index, $this->sectionImages)) {
                $sectionFile = $this->sectionImages[$index];
            }
            if ($sectionFile !== null && method_exists($sectionFile, 'store')) {
                // Delete old stored image if exists and stored locally
                if ($section->image && Storage::disk('public')->exists($section->image)) {
                    Storage::disk('public')->delete($section->image);
                }
                $stored = $sectionFile->store('story_sections', 'public');
                $data['image'] = $stored;
            }

            $section->update($data);
            // Reset upload for this section
            $this->sectionImages[$index] = null;
            $this->sectionImageResetKey++;
            $this->dispatch('filepond-reset-sectionImages.' . $index);
            $this->loadSections();
            session()->flash('success', 'Đã cập nhật câu chuyện.');
        }
    }

    public function deleteSection($index)
    {
        $section = StorySection::find($this->sections[$index]['id']);
        if ($section) {
            $section->delete();
            $this->loadSections();
            $this->dispatch('story-section-deleted');
            session()->flash('success', 'Đã xóa câu chuyện.');
        }
    }

    public function render()
    {
        return view('livewire.love-story');
    }
}
