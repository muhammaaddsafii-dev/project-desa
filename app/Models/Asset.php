<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_desa', 'visi', 'misi', 'lokasi_dan_geografi', 'penduduk_dan_demografi', 'potensi_dan_sumberdaya', 'lokasi', 'email', 'kontak', 'header_image', 'header_video'
    ];
}
