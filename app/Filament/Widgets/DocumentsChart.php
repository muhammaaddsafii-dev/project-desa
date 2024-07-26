<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Document;
use Carbon\Carbon;

class DocumentsChart extends ChartWidget
{
    protected static ?string $heading = 'Permohonan Surat';
    protected static ?int $sort = 10;

    protected function getData(): array
    {
        // Mengambil jumlah dokumen per bulan
        $documentsPerMonth = Document::selectRaw('COUNT(*) as count, EXTRACT(MONTH FROM created_at) as month')
            ->whereYear('created_at', Carbon::now()->year)
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('count', 'month');

        // Menyiapkan data untuk chart
        $chartData = [];
        for ($i = 1; $i <= 12; $i++) {
            $chartData[] = $documentsPerMonth->get($i, 0);
        }

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Dokumen',
                    'data' => $chartData,
                ],
            ],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
