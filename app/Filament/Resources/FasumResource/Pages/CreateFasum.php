<?php

namespace App\Filament\Resources\FasumResource\Pages;

use App\Filament\Resources\FasumResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;

class CreateFasum extends CreateRecord
{
    protected static string $resource = FasumResource::class;

    protected function getRedirectUrl(): string
    {
        if (auth()->user()->hasRole('super_admin')) {
            return $this->getResource()::getUrl('index');
        } else {
            return $this->getResource()::getUrl('index');
        }
    }

    protected function afterCreate(): void
    {
        if (!auth()->user()->hasRole('super_admin')) {
            Notification::make()
                ->title('Data berhasil disimpan')
                ->body('Data Anda telah berhasil disimpan dan sedang menunggu persetujuan admin.')
                ->success()
                ->send();
        }
    }
}
