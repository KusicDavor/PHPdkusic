<?php

namespace App\MessageHandler;

use App\Message\VacationRequestMail;
use Symfony\Component\Mailer\Transport\TransportInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class UsersMessageHandler
{
    private $transport;
    public function __construct(TransportInterface $transport)
    {
        $this->transport = $transport;
    }
    public function __invoke(UsersMessage $package)
    {
        $email = $package->getEmail();
        $this->transport->send($email);
    }
}

// php bin/console messenger:consume async -vv