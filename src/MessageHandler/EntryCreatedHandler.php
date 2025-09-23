<?php

namespace App\MessageHandler;

use App\Message\EntryCreated;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler()]
class EntryCreatedHandler {
    public function __invoke(EntryCreated $message): void
    {
        file_put_contents(
            __DIR__.'/../../var/log/entry_events.log',
            sprintf("Entry created: #%d %s %.2f\n", $message->id, $message->type, $message->amount),
            FILE_APPEND
        );
    }
}
