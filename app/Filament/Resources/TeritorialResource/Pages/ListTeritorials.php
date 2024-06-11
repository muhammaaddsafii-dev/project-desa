<?php

namespace App\Filament\Resources\TeritorialResource\Pages;

use App\Filament\Resources\TeritorialResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTeritorials extends ListRecords
{
    protected static string $resource = TeritorialResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
