<?php

namespace App\MessageHandler;

use App\Entity\VacationRequest;
use App\Message\SmsNotification;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class SmsNotificationHandler
{
    public function __invoke(VacationRequest $vacationRequest)
    {
        $user = $vacationRequest->getUser();
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
        dd($email);
        // ... do some work - like sending an SMS message!
    }
}
