<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use App\Models\Jalan;

class UpdateJalanJob implements ShouldQueue
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
        $jalans = Jalan::all();
        $features = [];

        foreach ($jalans as $jalan) {
            $features[] = [
                'type' => 'Feature',
                'properties' => [
                    'Name' => $jalan->Name,
                    'FOTO' => $jalan->FOTO,
                    'PERKERASAN' => $jalan->PERKERASAN,
                    'KONDISI' => $jalan->KONDISI,
                    'SUMBER' => $jalan->SUMBER,
                ],
                'geometry' => [
                    'type' => 'Point',
                    'coordinates' => [$jalan->longitude, $jalan->latitude, 0.0],
                ],
            ];
        }

        $geoJson = [
            'type' => 'FeatureCollection',
            'name' => 'kondisi_jalan',
            'features' => $features,
        ];

        Storage::disk('s3')->put('desa-template/geojson/kondisi_jalan.geojson', json_encode($geoJson, JSON_PRETTY_PRINT));
    }
}
