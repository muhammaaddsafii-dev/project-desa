<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use App\Models\Fasum;
use Illuminate\Support\Facades\Log;

class ImportFasumData extends Command
{
    protected $signature = 'fasum:import';
    protected $description = 'Import fasum data from fasum.geojson';

    public function handle()
    {
        $s3Path = 'desa-template/geojson/fasum.geojson'; // Update this with the actual S3 path

        try {
            $contents = Storage::disk('s3')->get($s3Path);
            $geojson = json_decode($contents, true);

            foreach ($geojson['features'] as $feature) {
                Fasum::create([
                    'foto' => $feature['properties']['FOTO'],
                    'jenis' => $feature['properties']['JENIS'],
                    'objek' => $feature['properties']['OBJEK'],
                    'toponim' => $feature['properties']['TOPONIM'],
                    'sumber' => $feature['properties']['SUMBER'],
                    'keterangan' => $feature['properties']['Keterangan'],
                    'latitude' => $feature['geometry']['coordinates'][1],
                    'longitude' => $feature['geometry']['coordinates'][0],
                ]);
            }

            $this->info('Fasum data imported successfully.');
        } catch (\Exception $e) {
            $this->error('Error importing Fasum data: ' . $e->getMessage());
        }
    }
}
