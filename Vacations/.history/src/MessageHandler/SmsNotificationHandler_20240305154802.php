<?php

namespace App\MessageHandler;

use App\Message\SmsNotification;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class SmsNotificationHandler
{
    public function __invoke(SmsNotification $mail)
    {
        $vacationRequest = $message->getVacationRequest();
        
        dd($message);
        // ... do some work - like sending an SMS message!
    }
}
