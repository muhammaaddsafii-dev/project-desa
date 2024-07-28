<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'content',
        'image',
        'published_at',
    ];

    public function images()
    {
        return $this->hasMany(NewsImage::class);
    }

    public function author(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
