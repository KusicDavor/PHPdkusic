<?php

namespace App\Message;

use Symfony\Bridge\Twig\Mime\TemplatedEmail;

class SmsNotification
{
    public function __construct(
        private string $email,
    ) {
    }

    public function getEmail(): TemplatedEmail
    {
        return $this->email;
    }
}
