<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Wedding
 *
 * @property int $id
 * @property string $wedding_date
 * @property string $bride_name
 * @property string $groom_name
 * @property string $about_bride
 * @property string $about_groom
 * @property string $bride_mother
 * @property string $brider_father
 * @property string $groom_mother
 * @property string $groom_father
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $created_by
 * @property int|null $template_id
 * @property string|null $bride_image
 * @property string|null $groom_image
 * @property string|null $bride_birthday
 * @property string|null $groom_birthday
 */
class Wedding extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'wedding_date',
        'bride_name',
        'groom_name',
        'about_bride',
        'about_groom',
        'bride_mother',
        'bride_father',
        'groom_mother',
        'groom_father',
        'created_at',
        'updated_at',
        'created_by',
        'template_id',
        'bride_image',
        'groom_image',
        'bride_birthday',
        'groom_birthday',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'wedding_date' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the user that created the wedding.
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Get the template used by the wedding.
     */
    public function template()
    {
        return $this->belongsTo(SettupTemplate::class, 'template_id');
    }

    /**
     * Get all of the story sections for the wedding.
     */
    public function storySections()
    {
        return $this->hasMany(StorySection::class);
    }

    /**
     * Get all of the gallery albums for the wedding.
     */
    public function galleryAlbums()
    {
        return $this->hasMany(GalleryAlbum::class);
    }

    /**
     * Get all of the events for the wedding.
     */
    public function events()
    {
        return $this->hasMany(Event::class);
    }

    /**
     * Get all of the RSVP forms for the wedding.
     */
    public function rsvpForms()
    {
        return $this->hasMany(RsvpForm::class);
    }

    /**
     * Get all of the locations for the wedding.
     */
    public function weddingLocations()
    {
        return $this->hasMany(WeddingLocation::class);
    }

    /**
     * Get all of the gift boxes for the wedding.
     */
    public function giftBoxes()
    {
        return $this->hasMany(WeddingGiftBox::class);
    }
}
