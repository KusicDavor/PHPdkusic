<?php

namespace App\Message;

use App\Entity\VacationRequest;
use AsyncAws\Ses\ValueObject\Template;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;

class SmsNotification
{
    public function __construct(
        private VacationRequest $email,
    ) {
    }

    public function getVaca(): VacationRequest
    {
        return $this->email;
    }
}
