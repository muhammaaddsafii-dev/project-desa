<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resident extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'kks_id',
        'nik',
        'status_perkawinan',
        'jenis_kelamin',
        'pendidikan',
        'pekerjaan',
        'penghasilan_per_bulan',
        'tanggal_lahir',
        'whatsapp',
    ];

    public function kks()
    {
        return $this->belongsTo(Kk::class);
    }
}
