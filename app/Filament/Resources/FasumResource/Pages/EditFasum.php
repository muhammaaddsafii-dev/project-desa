<?php

namespace App\Filament\Resources\FasumResource\Pages;

use App\Filament\Resources\FasumResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFasum extends EditRecord
{
    protected static string $resource = FasumResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
