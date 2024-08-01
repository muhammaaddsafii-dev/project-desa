<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;

class ImportFasumData extends Command
{
    protected $signature = 'import:fasum-data';
    protected $description = 'Import Fasum data from GeoJSON file in S3 to PostgreSQL';

    public function handle()
    {
        $this->info('Importing Fasum data...');

        // S3 file URL
        $url = 'https://cdn-project-desa.s3.ap-southeast-1.amazonaws.com/desa-template/geojson/fasum.geojson';

        // Fetch the file content
        $client = new Client();
        $response = $client->get($url);
        $content = $response->getBody()->getContents();

        // Parse the GeoJSON
        $geojson = json_decode($content, true);

        // Check if the parsing was successful
        if (json_last_error() !== JSON_ERROR_NONE) {
            $this->error('Failed to parse GeoJSON: ' . json_last_error_msg());
            return;
        }

        // Import each feature
        foreach ($geojson['features'] as $feature) {
            $properties = $feature['properties'];
            $coordinates = $feature['geometry']['coordinates'];

            DB::table('fasum')->insert([
                'foto' => $properties['FOTO'] ?? null,
                'jenis' => $properties['JENIS'] ?? '',
                'objek' => $properties['OBJEK'] ?? null,
                'toponim' => $properties['TOPONIM'] ?? '',
                'sumber' => $properties['SUMBER'] ?? '',
                'keterangan' => $properties['Keterangan'] ?? '',
                'latitude' => $coordinates[1],
                'longitude' => $coordinates[0],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        $this->info('Fasum data imported successfully!');
    }
}
