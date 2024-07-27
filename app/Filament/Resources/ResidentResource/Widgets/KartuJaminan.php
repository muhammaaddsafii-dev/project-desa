<?php

namespace App\Filament\Resources\ResidentResource\Widgets;

use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class KartuJaminan extends ChartWidget
{
    protected static ?string $heading = 'Chart';

    protected function getData(): array
    {
        // Ambil data jumlah Kartu Jaminan
        $kartuJamiCounts = DB::table('penduduk')
            ->select('Kartu_Jami', DB::raw('count(*) as total'))
            ->groupBy('Kartu_Jami')
            ->orderBy('Kartu_Jami') // Mengurutkan berdasarkan Kartu_Jami (opsional)
            ->get();

        // Format data untuk chart
        $labels = $kartuJamiCounts->pluck('Kartu_Jami')->map(function ($kartuJami) {
            return $kartuJami ?: 'Tidak Ada'; // Menyediakan label default jika nilai kosong
        })->toArray();

        $values = $kartuJamiCounts->pluck('total')->toArray();

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Kartu Jaminan',
                    'data' => $values,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
