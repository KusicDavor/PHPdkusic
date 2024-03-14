<?php

namespace App\Message;

use AsyncAws\Ses\ValueObject\Template;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;

class SmsNotification
{
    public function __construct(
        private Template $email,
    ) {
    }

    public function getEmail(): TemplatedEmail
    {
        return $this->email;
    }
}
