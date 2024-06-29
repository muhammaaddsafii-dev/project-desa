<?php

namespace App\Listeners;

use App\Events\DocumentStatusChanged;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\DocumentStatusChangedMail;

class SendDocumentStatusChangedNotification implements ShouldQueue
{
    /**
     * Handle the event.
     *
     * @param  \App\Events\DocumentStatusChanged  $event
     * @return void
     */
    public function handle(DocumentStatusChanged $event)
    {
        $document = $event->document;
        $user = $document->user;

        // Kirim email ke user
        Mail::to($user->email)->send(new DocumentStatusChangedMail($document));
    }
}
