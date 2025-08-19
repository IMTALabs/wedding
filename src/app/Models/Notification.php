<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = ['wedding_id', 'message', 'is_active'];

    public function wedding()
    {
        return $this->belongsTo(Wedding::class);
    }
}
