<?php

namespace App\Filament\Resources\ResidentResource\Pages;

use App\Filament\Resources\ResidentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Pages\Actions\ButtonAction;

class ListResidents extends ListRecords
{
    protected static string $resource = ResidentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ButtonAction::make('petapenduduk')
                ->label('Peta Penduduk')
                ->url(route('peta-penduduk-admin'))  // Assuming you have a named route
                ->icon('heroicon-o-globe-asia-australia')
                ->color('warning')
                ->openUrlInNewTab(),
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
                // ResidentResource\Widgets\JumlahPendudukRT::class,
                // ResidentResource\Widgets\KartuJaminan::class,
            ResidentResource\Widgets\ResidentCharts::class,
        ];
    }

    public function petapenduduk()
    {
        return view('application.maps-admin.peta-kependudukan');
    }
}
