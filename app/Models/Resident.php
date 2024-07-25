<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resident extends Model
{
    use HasFactory;

    protected $table = 'penduduk';

    protected $fillable = [
        'Nomor',
        'Foto',
        'Nama_Kepal',
        'Jenis_Kela',
        'Status_Tem',
        'Luas_Lanta',
        'Jenis_Lant',
        'Jenis_Dind',
        'Fasilitas_',
        'Fasilitas1',
        'Fasilita_1',
        'Bahan_Baka',
        'Kartu_Jami',
        'Akses_Info',
        'RT',
        'RW',
        'Keterangan',
        'Profesi_KK',
        'NIK',
        'DATA',
        'Jumlah_KK',
        'SUMBER',
        'latitude',
        'longitude',
    ];

    protected $casts = [
        'latitude' => 'float',
        'longitude' => 'float',
    ];
}
