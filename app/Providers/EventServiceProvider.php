<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Events\DocumentStatusChanged;
use App\Listeners\SendDocumentStatusChangedNotification;
use App\Models\Resident;
use App\Observers\ResidentObserver;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        DocumentStatusChanged::class => [
            SendDocumentStatusChangedNotification::class,
        ],
    ];

    public function boot()
    {
        parent::boot();
        Resident::observe(ResidentObserver::class);
    }
}
