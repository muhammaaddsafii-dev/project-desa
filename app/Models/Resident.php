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
        'Foto' => 'string'
    ];

    public function getFotoUrl(): string
    {
        $baseUrl = 'https://cdn-project-desa.s3.ap-southeast-1.amazonaws.com/';
        $fotoPath = urlencode($this->Foto);

        // Cek apakah path foto sudah mengandung direktori yang diinginkan
        if (strpos($this->Foto, 'desa-template/images/rumah-warga/') === 0) {
            // Jika sudah mengandung direktori, gunakan path seperti adanya
            return $baseUrl . $fotoPath;
        } else {
            // Jika tidak, tambahkan direktori default
            return $baseUrl . 'desa-template/images/rumah-warga/' . $fotoPath;
        }
    }


    public function scopeLatestRecords($query)
    {
        return $query->latest('created_at'); // Use 'updated_at' if you prefer
    }
}
