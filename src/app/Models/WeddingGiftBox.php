<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class WeddingGiftBox
 *
 * @property int $id
 * @property int $wedding_id
 * @property string $type
 * @property string|null $bank_name
 * @property string|null $bank_number
 * @property string|null $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 */
class WeddingGiftBox extends Model
{
    use HasFactory;

    protected $table = 'wedding_gift_boxs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'wedding_id',
        'type',
        'bank_name',
        'bank_number',
        'name',
        'image_qr',
        'bank_id',
    ];

    /**
     * Get the wedding that owns the gift box information.
     */
    public function wedding()
    {
        return $this->belongsTo(Wedding::class);
    }

    //banks relationship
    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }
}
