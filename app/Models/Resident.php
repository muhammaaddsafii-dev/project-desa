<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resident extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'birth_date',
        'address',
        'phone_number',
        'teritorial_id',
    ];

    public function kk()
    {
        return $this->belongsTo(Kk::class);
    }
}
