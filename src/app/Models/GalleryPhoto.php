<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class GalleryPhoto
 *
 * @property int $id
 * @property int $album_id
 * @property string|null $caption
 * @property int $oposition
 * @property string|null $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 */
class GalleryPhoto extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'album_id',
        'caption',
        'oposition',
        'image',
    ];

    /**
     * Get the gallery album that owns the photo.
     */
    public function album()
    {
        return $this->belongsTo(GalleryAlbum::class);
    }
}
