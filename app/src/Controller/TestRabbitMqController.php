<?php

namespace App\Controller;

use App\Message\TestMessage;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TestRabbitMqController extends AbstractController
{
    #[Route('/test-message', name: 'test_message')]
    public function sendMessage(MessageBusInterface $bus): Response
    {
        $bus->dispatch(new TestMessage('Hello RabbitMQ!'));

        return new Response('Message sent!');
    }
}
