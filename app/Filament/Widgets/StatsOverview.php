<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\User;
use App\Models\Document;
use App\Models\News;
use App\Models\Activity;
use App\Models\Resident;


class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $userCount = User::count();
        $documentCount = Document::count();
        $newsCount = News::count();
        $activityCount = Activity::count();
        $residentCount = Resident::count();

        $documentsPerMonth = Document::selectRaw('COUNT(*) as count, EXTRACT(MONTH FROM created_at) as month')
            ->groupBy('month')
            ->pluck('count', 'month');

        $chartData = [];
        for ($i = 1; $i <= 12; $i++) {
            $chartData[] = $documentsPerMonth->get($i, 0);
        }

        return [
            Stat::make('Jumlah Pengguna', $userCount)
                ->description('Total Pengguna')
                ->descriptionIcon('heroicon-m-user-group')
                ->color('success'),

            Stat::make('Jumlah Penduduk', $residentCount)
                ->description('Total Penduduk')
                ->descriptionIcon('heroicon-m-user-group')
                ->color('danger'),

            Stat::make('Jumlah Berita', $newsCount)
                ->description('Total Berita')
                ->descriptionIcon('heroicon-m-newspaper')
                ->color('warning'),

            Stat::make('Jumlah Kegiatan', $activityCount)
                ->description('Total Kegiatan')
                ->descriptionIcon('heroicon-m-calendar')
                ->color('info'),
        ];
    }
}
