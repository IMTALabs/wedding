<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class RsvpForm
 *
 * @property int $id
 * @property int $wedding_id
 * @property string $guest_name
 * @property string|null $guest_message
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $attendance_status
 * @property bool $is_hidden
 */
class RsvpForm extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'wedding_id',
        'guest_name',
        'guest_message',
        'created_at',
        'updated_at',
        'attendance_status',
        'is_hidden',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'datetime',
        'is_hidden' => 'boolean',
    ];

    /**
     * Get the wedding that owns the RSVP form.
     */
    public function wedding()
    {
        return $this->belongsTo(Wedding::class);
    }
}
