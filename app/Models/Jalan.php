<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jalan extends Model
{
    use HasFactory;

    protected $table = 'jalan';

    protected $fillable = [
        'Name',
        'FOTO',
        'PERKERASAN',
        'KONDISI',
        'SUMBER',
        'longitude',
        'latitude',
    ];

    public function getFotoUrl(): string
    {
        $baseUrl = 'https://cdn-project-desa.s3.ap-southeast-1.amazonaws.com/';
        $fotoPath = urlencode($this->FOTO);

        // Cek apakah path foto sudah mengandung direktori yang diinginkan
        if (strpos($this->FOTO, 'desa-template/images/jalan/') === 0) {
            // Jika sudah mengandung direktori, gunakan path seperti adanya
            return $baseUrl . $fotoPath;
        } else {
            // Jika tidak, tambahkan direktori default
            return $baseUrl . 'desa-template/images/jalan/' . $fotoPath;
        }
    }


    public function scopeLatestRecords($query)
    {
        return $query->latest('created_at'); // Use 'updated_at' if you prefer
    }
}
