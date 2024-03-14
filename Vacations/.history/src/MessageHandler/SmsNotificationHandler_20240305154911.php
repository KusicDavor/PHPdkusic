<?php

namespace App\MessageHandler;

use App\Message\SmsNotification;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class SmsNotificationHandler
{
    private $transport;
    public function __construct(TransportInterface $transport
    public function __invoke(SmsNotification $mail)
    {
        $this->transport->send($email);
        dd($mail);
        // ... do some work - like sending an SMS message!
    }
}
