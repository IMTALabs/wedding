<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class WeddingLocation
 *
 * @property int $id
 * @property int $wedding_id
 * @property string $name_location
 * @property \Illuminate\Support\Carbon|null $date
 * @property string $type
 * @property string|null $link_embed
 * @property bool $is_hidden
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 */
class WeddingLocation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'wedding_id',
        'name_location',
        'date',
        'type',
        'link_embed',
        'is_hidden',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'date' => 'datetime',
        'is_hidden' => 'boolean',
    ];

    /**
     * Get the wedding that owns the location.
     */
    public function wedding()
    {
        return $this->belongsTo(Wedding::class);
    }

    /**
     * Get the location type label in Vietnamese.
     */
    public function getTypeLabel(): string
    {
        $types = [
            'ceremony' => 'Lễ cưới',
            'reception' => 'Tiệc cưới',
            'bride_home' => 'Nhà cô dâu',
            'groom_home' => 'Nhà chú rể',
            'other' => 'Khác',
        ];

        return $types[$this->type] ?? $this->type;
    }

    /**
     * Scope a query to only include visible locations.
     */
    public function scopeVisible($query)
    {
        return $query->where('is_hidden', false);
    }

    /**
     * Scope a query to only include hidden locations.
     */
    public function scopeHidden($query)
    {
        return $query->where('is_hidden', true);
    }

    /**
     * Scope a query to order locations by date.
     */
    public function scopeOrderByDate($query, $direction = 'asc')
    {
        return $query->orderBy('date', $direction);
    }
}
