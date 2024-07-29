<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fasum extends Model
{
    use HasFactory;

    protected $table = 'fasum';

    protected $fillable = [
        'foto',
        'jenis',
        'objek',
        'toponim',
        'sumber',
        'keterangan',
        'latitude',
        'longitude',
    ];

    protected $casts = [
        'latitude' => 'float',
        'longitude' => 'float',
    ];

    public function getFotoUrl(): string
    {
        $baseUrl = 'https://cdn-project-desa.s3.ap-southeast-1.amazonaws.com/';
        $fotoPath = urlencode($this->foto);

        // Cek apakah path foto sudah mengandung direktori yang diinginkan
        if (strpos($this->foto, 'desa-template/images/fasilitas-umum/') === 0) {
            // Jika sudah mengandung direktori, gunakan path seperti adanya
            return $baseUrl . $fotoPath;
        } else {
            // Jika tidak, tambahkan direktori default
            return $baseUrl . 'desa-template/images/fasilitas-umum/' . $fotoPath;
        }
    }


    public function scopeLatestRecords($query)
    {
        return $query->latest('created_at'); // Use 'updated_at' if you prefer
    }
}
