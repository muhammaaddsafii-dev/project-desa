<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use App\Models\Resident;

class UpdateGeoJsonJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $residents = Resident::all();
        $features = [];

        foreach ($residents as $resident) {
            $features[] = [
                'type' => 'Feature',
                'properties' => [
                    'Nomor' => $resident->Nomor,
                    'Foto' => $resident->Foto,
                    'Nama_Kepal' => $resident->Nama_Kepal,
                    'Jenis_Kela' => $resident->Jenis_Kela,
                    'Status_Tem' => $resident->Status_Tem,
                    'Luas_Lanta' => $resident->Luas_Lanta,
                    'Jenis_Lant' => $resident->Jenis_Lant,
                    'Jenis_Dind' => $resident->Jenis_Dind,
                    'Fasilitas_' => $resident->Fasilitas_,
                    'Fasilitas1' => $resident->Fasilitas1,
                    'Fasilita_1' => $resident->Fasilita_1,
                    'Bahan_Baka' => $resident->Bahan_Baka,
                    'Kartu_Jami' => $resident->Kartu_Jami,
                    'Akses_Info' => $resident->Akses_Info,
                    'RT' => $resident->RT,
                    'RW' => $resident->RW,
                    'Keterangan' => $resident->Keterangan,
                    'Profesi_KK' => $resident->Profesi_KK,
                    'NIK' => $resident->NIK,
                    'DATA' => $resident->DATA,
                    'Jumlah_KK' => $resident->Jumlah_KK,
                    'SUMBER' => $resident->SUMBER,
                ],
                'geometry' => [
                    'type' => 'Point',
                    'coordinates' => [$resident->longitude, $resident->latitude],
                ],
            ];
        }

        $geoJson = [
            'type' => 'FeatureCollection',
            'features' => $features,
        ];

        Storage::disk('s3')->put('desa-template/geojson/penduduk.geojson', json_encode($geoJson));
    }
}
