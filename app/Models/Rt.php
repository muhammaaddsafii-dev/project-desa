<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rt extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomor_rt',
        'nama_rt',
    ];

    public function residents()
    {
        return $this->hasMany(Resident::class);
    }
}
