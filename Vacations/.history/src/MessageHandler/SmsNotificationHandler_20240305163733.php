<?php

namespace App\MessageHandler;

use App\Message\VacationRequestMail;
use Symfony\Component\Mailer\Transport\TransportInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class SmsNotificationHandler
{
    private $transport;
    public function __construct(TransportInterface $transport)
    {
        $this->transport = $transport;
    }
    public function __invoke(VacationRequestMail $package)
    {
        $email = $package->getEmail();
        $this->transport->send($email);
    }
}
