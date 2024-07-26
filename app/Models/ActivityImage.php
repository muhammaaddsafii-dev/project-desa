<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'activity_id',
        'image_path',
    ];

    public function product()
    {
        return $this->belongsTo(Activity::class);
    }
}
