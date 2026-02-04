<?php

namespace App\MessageHandler;

use App\Message\TestMessage;

class MessageHandler
{
    public function __invoke(TestMessage $message)
    {
        // Just log or dump the message content
        dump('Received message: ' . $message->getContent());
    }
}
