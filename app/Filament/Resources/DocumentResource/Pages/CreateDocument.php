<?php

namespace App\Filament\Resources\DocumentResource\Pages;

use App\Filament\Resources\DocumentResource;
// use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Actions\Action;
use App\Models\User;

class CreateDocument extends CreateRecord
{
    protected static string $resource = DocumentResource::class;

    protected function afterCreate(): void
    {
        $document = $this->record;

        // Ambil semua user dengan peran 'super_admin'
        $superAdmins = User::whereHas('roles', function ($query) {
            $query->where('name', 'super_admin'); // Ganti dengan nama kolom dan nilai yang sesuai
        })->get();

        // Kirim notifikasi ke setiap user 'super_admin'
        foreach ($superAdmins as $superAdmin) {
            Notification::make()
                ->title('New Document created')
                ->icon('heroicon-o-shopping-bag')
                ->body("New Document {$document->type} created")
                // ->actions([
                //     Action::make('view')->url(
                //         DocumentResource::getUrl('edit', ['record' => $document])
                //     ),
                // ])
                ->sendToDatabase($superAdmin); // Mengirim notifikasi ke user 'super_admin'
        }
    }
}
