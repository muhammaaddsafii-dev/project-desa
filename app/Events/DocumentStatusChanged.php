<?php

namespace App\Events;

use App\Models\Document;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class DocumentStatusChanged
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $document;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Document $document)
    {
        $this->document = $document;
    }
}
