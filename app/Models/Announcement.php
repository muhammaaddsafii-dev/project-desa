<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AnnouncementImage;

class Announcement extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'published_at',
    ];

    public function images()
    {
        return $this->hasMany(AnnouncementImage::class);
    }
}
