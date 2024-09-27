<?php

namespace App\Filament\Resources\FasumResource\Pages;

use App\Filament\Resources\FasumResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Pages\Actions\ButtonAction;

class ListFasums extends ListRecords
{
    protected static string $resource = FasumResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ButtonAction::make('petafasum')
                ->label('Peta Fasilitas Umum')
                ->url(route('peta-fasum-admin'))  // Assuming you have a named route
                ->icon('heroicon-o-globe-asia-australia')
                ->color('warning')
                ->openUrlInNewTab(),
            Actions\CreateAction::make(),
        ];
    }

}
