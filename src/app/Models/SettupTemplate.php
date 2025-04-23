<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SettupTemplate
 *
 * @property int $id
 * @property string|null $banner
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Wedding> $weddings
 * @property-read int|null $weddings_count
 */
class SettupTemplate extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'banner',
    ];

    /**
     * Get all of the weddings that use this template.
     */
    public function weddings()
    {
        return $this->hasMany(Wedding::class, 'template_id');
    }
}
