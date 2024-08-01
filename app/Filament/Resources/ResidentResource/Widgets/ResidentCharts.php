<?php

namespace App\Filament\Resources\ResidentResource\Widgets;

use App\Models\Resident;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class ResidentCharts extends ChartWidget
{
    protected static ?string $heading = 'Grafik Penduduk';

    protected int | string | array $columnSpan = 'full';

    public ?string $filter = 'rt';

    protected function getData(): array
    {
        $data = match ($this->filter) {
            'rt' => $this->getRTData(),
            'kartu_jaminan' => $this->getKartuJaminanData(),
            default => $this->getRTData(),
        };

        return [
            'datasets' => [
                [
                    'label' => $this->filter === 'rt' ? 'Jumlah Penduduk' : 'Jumlah',
                    'data' => $data['values'],
                ],
            ],
            'labels' => $data['labels'],
        ];
    }

    protected function getRTData(): array
    {
        $data = Resident::groupBy('RT')
            ->select('RT', DB::raw('count(*) as total'))
            ->orderBy('RT')
            ->get();

        return [
            'labels' => $data->pluck('RT')->toArray(),
            'values' => $data->pluck('total')->toArray(),
        ];
    }

    protected function getKartuJaminanData(): array
    {
        $data = Resident::groupBy('Kartu_Jami')
            ->select('Kartu_Jami', DB::raw('count(*) as total'))
            ->orderBy('Kartu_Jami')
            ->get();

        return [
            'labels' => $data->pluck('Kartu_Jami')->toArray(),
            'values' => $data->pluck('total')->toArray(),
        ];
    }

    protected function getFilters(): ?array
    {
        return [
            'rt' => 'Jumlah Penduduk per RT',
            'kartu_jaminan' => 'Kartu Jaminan',
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
