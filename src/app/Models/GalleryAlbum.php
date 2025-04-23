<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class GalleryAlbum
 *
 * @property int $id
 * @property int $wedding_id
 * @property string $album_name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 */
class GalleryAlbum extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'wedding_id',
        'album_name',
        'description',
    ];

    /**
     * Get the wedding that owns the gallery album.
     */
    public function wedding()
    {
        return $this->belongsTo(Wedding::class);
    }

    /**
     * Get all of the photos for the gallery album.
     */
    public function photos()
    {
        return $this->hasMany(GalleryPhoto::class, 'album_id');
    }
}
