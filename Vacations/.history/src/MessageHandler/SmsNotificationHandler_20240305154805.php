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
        $vacationRequest = $mail->getVacationRequest();

        dd($mail);
        // ... do some work - like sending an SMS message!
    }
}
