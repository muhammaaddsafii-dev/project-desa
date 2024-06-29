<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Events\DocumentStatusChanged;
use App\Listeners\SendDocumentStatusChangedNotification;

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
    }
}
