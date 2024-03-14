<?php

namespace App\Message;

class SmsNotification
{
    public function __construct(
        private string $content,
    ) {
    }

    public function getEmail(): string
    {
        return $this->content;
    }
}
