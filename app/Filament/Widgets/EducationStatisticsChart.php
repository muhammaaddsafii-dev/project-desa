<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Resident;

class EducationStatisticsChart extends ChartWidget
{
    protected static ?string $heading = 'Grafik Pendidikan';

    protected function getData(): array
    {
        // Mengumpulkan data pendidikan
        $pendidikanCounts = Resident::query()
            ->select('pendidikan', \DB::raw('count(*) as total'))
            ->groupBy('pendidikan')
            ->pluck('total', 'pendidikan')
            ->all();

        // Menentukan warna untuk setiap bagian chart
        $colors = [
            'SD' => 'rgba(255, 99, 132, 0.2)',   // Warna untuk SD
            'SMP' => 'rgba(54, 162, 235, 0.2)',  // Warna untuk SMP
            'SMA' => 'rgba(255, 206, 86, 0.2)',  // Warna untuk SMA
            'Diploma' => 'rgba(75, 192, 192, 0.2)', // Warna untuk Diploma
            'Sarjana' => 'rgba(153, 102, 255, 0.2)', // Warna untuk Sarjana
        ];

        // Menentukan warna background untuk setiap dataset
        $backgroundColors = [];
        foreach (array_keys($pendidikanCounts) as $pendidikan) {
            $backgroundColors[] = $colors[$pendidikan] ?? 'rgba(201, 203, 207, 0.2)'; // Warna default
        }

        // Data untuk chart
        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Penduduk',
                    'data' => array_values($pendidikanCounts),
                    'backgroundColor' => $backgroundColors,
                    'borderColor' => array_map(function ($color) {
                        return str_replace('0.2', '1', $color); // Border color dari background color
                    }, $backgroundColors),
                    'borderWidth' => 1,
                ],
            ],
            'labels' => array_keys($pendidikanCounts),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
