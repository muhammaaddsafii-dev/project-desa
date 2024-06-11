<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Geospatial extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'coordinates',
        'teritorial_id',
    ];

    public function teritorial()
    {
        return $this->belongsTo(Teritorial::class);
    }
}
