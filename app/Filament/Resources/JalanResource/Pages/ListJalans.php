<?php

namespace App\Filament\Resources\JalanResource\Pages;

use App\Filament\Resources\JalanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Pages\Actions\ButtonAction;

class ListJalans extends ListRecords
{
    protected static string $resource = JalanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ButtonAction::make('petajalan')
                ->label('Peta Kondisi Jalan')
                ->url(route('peta-jalan-admin'))  // Assuming you have a named route
                ->icon('heroicon-o-globe-asia-australia')
                ->color('warning')
                ->openUrlInNewTab(),
            Actions\CreateAction::make(),
        ];
    }
}
