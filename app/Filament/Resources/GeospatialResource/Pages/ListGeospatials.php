<?php

namespace App\Filament\Resources\GeospatialResource\Pages;

use App\Filament\Resources\GeospatialResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGeospatials extends ListRecords
{
    protected static string $resource = GeospatialResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
