<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Event
 *
 * @property int $id
 * @property int $wedding_id
 * @property string $event_name
 * @property string $event_date
 * @property string|null $event_location
 * @property string|null $description
 * @property string|null $link_embed
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 */
class Event extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'wedding_id',
        'event_name',
        'event_date',
        'event_location',
        'description',
        'link_embed',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'event_date' => 'datetime',
    ];

    /**
     * Get the wedding that owns the event.
     */
    public function wedding()
    {
        return $this->belongsTo(Wedding::class);
    }
}
