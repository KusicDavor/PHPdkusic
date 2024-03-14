<?php

namespace App\MessageHandler;

use App\Message\SmsNotification;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class SmsNotificationHandler
{
    public function __invoke(SmsNotification $message)
    {
        $vacationRequest = $message->getVacationRequestID()
        $user = $message->getVacationRequest();
        $email = (new TemplatedEmail())
            ->to('to@xample.com')
            ->from('from@xample.com')
            ->subject('Request Approved')
            ->text('Your request has been approved.')
            ->htmlTemplate('email/requestApproved.html.twig')
            ->context([
                'user' => $user,
                'vacationRequest' => $vacationRequest
            ]);
        dd($message);
        // ... do some work - like sending an SMS message!
    }
}
