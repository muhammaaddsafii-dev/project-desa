<?php

namespace App\Filament\Resources\GeospatialResource\Pages;

use App\Filament\Resources\GeospatialResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGeospatial extends EditRecord
{
    protected static string $resource = GeospatialResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
