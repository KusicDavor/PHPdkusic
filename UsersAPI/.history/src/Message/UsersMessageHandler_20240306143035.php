<?php

namespace App\MessageHandler;

use App\Message\UsersMessage;
use Symfony\Component\Mailer\Transport\TransportInterface;


#[App\MessageHandler\AsMessageHandler]
class UsersMessageHandler
{
    private $transport;
    public function __construct(TransportInterface $transport)
    {
        $this->transport = $transport;
    }
    public function __invoke(UsersMessage $package)
    {
        $file = $package->getFile();
        $this->transport->send($file);
    }
}

// php bin/console messenger:consume async -vv