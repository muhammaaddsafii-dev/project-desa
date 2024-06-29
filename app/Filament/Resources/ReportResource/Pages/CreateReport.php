<?php

namespace App\Filament\Resources\ReportResource\Pages;

use App\Filament\Resources\ReportResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Models\User;
use Filament\Notifications\Notification;

class CreateReport extends CreateRecord
{
    protected static string $resource = ReportResource::class;

    protected function afterCreate(): void
    {
        $report = $this->record;

        // Ambil semua user dengan peran 'super_admin'
        $superAdmins = User::whereHas('roles', function ($query) {
            $query->where('name', 'super_admin'); // Ganti dengan nama kolom dan nilai yang sesuai
        })->get();

        // Kirim notifikasi ke setiap user 'super_admin'
        foreach ($superAdmins as $superAdmin) {
            Notification::make()
                ->title('New Report created')
                ->icon('heroicon-o-shopping-bag')
                ->body("New Document {$report->type} created")
                // ->actions([
                //     Action::make('view')->url(
                //         DocumentResource::getUrl('edit', ['record' => $document])
                //     ),
                // ])
                ->sendToDatabase($superAdmin); // Mengirim notifikasi ke user 'super_admin'
        }
    }
}
