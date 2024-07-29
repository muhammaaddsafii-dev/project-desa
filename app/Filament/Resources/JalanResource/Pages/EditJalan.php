<?php

namespace App\Filament\Resources\JalanResource\Pages;

use App\Filament\Resources\JalanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditJalan extends EditRecord
{
    protected static string $resource = JalanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
