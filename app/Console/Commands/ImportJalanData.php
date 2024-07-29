<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use App\Models\Jalan;
use Illuminate\Support\Facades\Log;

class ImportJalanData extends Command
{
    protected $signature = 'jalan:import';
    protected $description = 'Import jalan data from kondisi_jalan.geojson';

    public function handle()
    {
        $path = 'desa-template/geojson/kondisi_jalan.geojson';

        // Check if the file exists
        if (!Storage::disk('s3')->exists($path)) {
            $this->error("File not found: {$path}");
            Log::error("File not found: {$path}");
            return 1;
        }

        // Get the file contents
        $json = Storage::disk('s3')->get($path);
        if ($json === false) {
            $this->error("Failed to read file: {$path}");
            Log::error("Failed to read file: {$path}");
            return 1;
        }

        // Decode the JSON
        $data = json_decode($json, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            $this->error("Failed to decode JSON: " . json_last_error_msg());
            Log::error("Failed to decode JSON: " . json_last_error_msg());
            return 1;
        }

        // Check if 'features' key exists
        if (!isset($data['features']) || !is_array($data['features'])) {
            $this->error("Invalid GeoJSON structure: 'features' array not found");
            Log::error("Invalid GeoJSON structure: 'features' array not found");
            return 1;
        }

        $count = 0;
        foreach ($data['features'] as $feature) {
            if (!isset($feature['properties']) || !isset($feature['geometry'])) {
                $this->warn("Skipping invalid feature");
                continue;
            }

            $properties = $feature['properties'];
            $geometry = $feature['geometry'];

            try {
                Jalan::updateOrCreate(
                    ['Name' => $properties['Name'] ?? ''],
                    [
                        'FOTO' => $properties['FOTO'] ?? null,
                        'PERKERASAN' => $properties['PERKERASAN'] ?? null,
                        'KONDISI' => $properties['KONDISI'] ?? null,
                        'SUMBER' => $properties['SUMBER'] ?? null,
                        'latitude' => $geometry['coordinates'][1] ?? null,
                        'longitude' => $geometry['coordinates'][0] ?? null,
                    ]
                );
                $count++;
            } catch (\Exception $e) {
                $this->error("Error processing feature: " . $e->getMessage());
                Log::error("Error processing feature: " . $e->getMessage());
            }
        }

        $this->info("Imported {$count} jalan records successfully.");
        return 0;
    }
}
