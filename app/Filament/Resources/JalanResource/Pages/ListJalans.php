<?php

namespace App\Filament\Resources\JalanResource\Pages;

use App\Filament\Resources\JalanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListJalans extends ListRecords
{
    protected static string $resource = JalanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
