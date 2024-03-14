<?php

namespace App\Message;

use Symfony\Bridge\Twig\Mime\TemplatedEmail;

class UsersMessage
{
    public function __construct(private TemplatedEmail $email)
    {
    }

    public function getU(): TemplatedEmail
    {
        return $this->email;
    }
}
