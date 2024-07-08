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
        'rts_id',
        'rws_id',
        'nik',
        'status_hubungan',
        'status_perkawinan',
        'jenis_kelamin',
        'pendidikan',
        'pekerjaan',
        'penghasilan_per_bulan',
        'tanggal_lahir',
        'whatsapp',
        'kepemilikan_harta_lancar',
        'kemampuan_konsumsi',
        'rasio_pengeluaran_pangan',
        'jenis_konsumsi',
        'kemampuan_membeli_pakaian',
        'status_tempat_tinggal',
        'luas_lantai',
        'jenis_lantai',
        'jenis_dinding',
        'fasilitas_mck',
        'fasilitas_ipal',
        'fasilitas_energi_penerangan',
        'fasilitas_air_minum',
        'bahan_bakar',
        'kartu_jaminan_kesehatan',
        'kemampuan_berobat',
        'akses_informasi',
    ];

    public function kks()
    {
        return $this->belongsTo(Kk::class);
    }
    
    public function rts()
    {
        return $this->belongsTo(Rt::class);
    }
    
    public function rws()
    {
        return $this->belongsTo(Rw::class);
    }
}
