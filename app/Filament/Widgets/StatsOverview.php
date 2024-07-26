<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\User;
use App\Models\Document;
use App\Models\News;
use App\Models\Activity;


class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $userCount = User::count();
        $documentCount = Document::count();
        $newsCount = News::count();
        $activityCount = Activity::count();

        $documentsPerMonth = Document::selectRaw('COUNT(*) as count, EXTRACT(MONTH FROM created_at) as month')
            ->groupBy('month')
            ->pluck('count', 'month');

        $chartData = [];
        for ($i = 1; $i <= 12; $i++) {
            $chartData[] = $documentsPerMonth->get($i, 0);
        }

        return [
            Stat::make('Jumlah User', $userCount)
                ->description('Total Users')
                ->descriptionIcon('heroicon-m-user-group')
                ->color('success'),

            // Stat::make('Jumlah Permohonan Surat', $documentCount)
            //     ->description('Total Documents')
            //     ->descriptionIcon('heroicon-m-document-text')
            //     ->chart($chartData),

            Stat::make('Jumlah Berita', $newsCount)
                ->description('Total News')
                ->descriptionIcon('heroicon-m-newspaper')
                ->color('warning'),

            Stat::make('Jumlah Kegiatan', $activityCount)
                ->description('Total Activities')
                ->descriptionIcon('heroicon-m-calendar')
                ->color('info'),
        ];
    }
}
