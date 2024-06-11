<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teritorial extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    public function residents()
    {
        return $this->hasMany(Resident::class);
    }

    public function geospatials()
    {
        return $this->hasMany(Geospatial::class);
    }
}
