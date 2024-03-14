<?php

namespace App\Message;

use Symfony\Bridge\Twig\Mime\TemplatedEmail;

class SmsNotification
{
    public function __construct(
        private string $content,
    ) {
    }

    public function getEmail(): TemplatedEmail
    {
        return $this->content;
    }
}
