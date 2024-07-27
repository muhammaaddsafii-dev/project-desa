<?php

namespace App\Filament\Resources\ResidentResource\Widgets;

use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class JumlahPendudukRT extends ChartWidget
{
    protected static ?string $heading = 'Chart';

    protected function getData(): array
    {
        // Ambil data jumlah penduduk per RT dan urutkan berdasarkan RT
        $pendudukCounts = DB::table('penduduk')
            ->select('RT', DB::raw('count(*) as total'))
            ->groupBy('RT')
            ->orderBy('RT') // Mengurutkan berdasarkan RT
            ->get();

        // Format data untuk chart
        $labels = $pendudukCounts->pluck('RT')->map(function ($rt) {
            return 'RT ' . $rt; // Tambahkan 'RT ' di depan setiap label RT
        })->toArray();

        $values = $pendudukCounts->pluck('total')->toArray();

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Penduduk Tiap RT',
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
