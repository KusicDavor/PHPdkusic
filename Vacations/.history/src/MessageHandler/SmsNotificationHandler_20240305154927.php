<?php

namespace App\MessageHandler;

use App\Message\SmsNotification;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class SmsNotificationHandler
{
    private $transport;
    public function __construct(TransportInterface $transport) {
        $this->transport = $transport;
    }
    public function __invoke(SmsNotification $email)
    {
        $this->transport->send($email);
        // ... do some work - like sending an SMS message!
    }
}
