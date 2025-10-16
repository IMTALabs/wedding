<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Audio
 *
 * @property int $id
 * @property int $name
 * @property string $file_path
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 */
class Audio extends Model
{
    protected $fillable = ['name', 'file_path'];

    public function getFileUrlAttribute()
    {
        return asset('storage/' . $this->file_path);
    }
}
