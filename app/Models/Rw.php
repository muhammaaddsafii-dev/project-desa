<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rw extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomor_rw',
        'nama_rw',
    ];

    public function residents()
    {
        return $this->hasMany(Resident::class);
    }
}
