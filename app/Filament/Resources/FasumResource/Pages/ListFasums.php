<?php

namespace App\Filament\Resources\FasumResource\Pages;

use App\Filament\Resources\FasumResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFasums extends ListRecords
{
    protected static string $resource = FasumResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
