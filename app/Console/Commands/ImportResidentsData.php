<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use App\Models\Resident;
use Illuminate\Support\Facades\Log;

class ImportResidentsData extends Command
{
    protected $signature = 'residents:import';
    protected $description = 'Import residents data from penduduk.geojson';

    public function handle()
    {
        $path = 'desa-template/geojson/penduduk.geojson';

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
                Resident::updateOrCreate(
                    ['Nomor' => $properties['Nomor'] ?? ''],
                    [
                        'Foto' => $properties['Foto'] ?? null,
                        'Nama_Kepal' => $properties['Nama_Kepal'] ?? null,
                        'Jenis_Kela' => $properties['Jenis_Kela'] ?? null,
                        'Status_Tem' => $properties['Status_Tem'] ?? null,
                        'Luas_Lanta' => $properties['Luas_Lanta'] ?? null,
                        'Jenis_Lant' => $properties['Jenis_Lant'] ?? null,
                        'Jenis_Dind' => $properties['Jenis_Dind'] ?? null,
                        'Fasilitas_' => $properties['Fasilitas_'] ?? null,
                        'Fasilitas1' => $properties['Fasilitas1'] ?? null,
                        'Fasilita_1' => $properties['Fasilita_1'] ?? null,
                        'Bahan_Baka' => $properties['Bahan_Baka'] ?? null,
                        'Kartu_Jami' => $properties['Kartu_Jami'] ?? null,
                        'Akses_Info' => $properties['Akses_Info'] ?? null,
                        'RT' => $properties['RT'] ?? null,
                        'RW' => $properties['RW'] ?? null,
                        'Keterangan' => $properties['Keterangan'] ?? null,
                        'Profesi_KK' => $properties['Profesi_KK'] ?? null,
                        'NIK' => $properties['NIK'] ?? null,
                        'DATA' => $properties['DATA'] ?? null,
                        'Jumlah_KK' => $properties['Jumlah_KK'] ?? null,
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

        $this->info("Imported {$count} residents successfully.");
        return 0;
    }
}
