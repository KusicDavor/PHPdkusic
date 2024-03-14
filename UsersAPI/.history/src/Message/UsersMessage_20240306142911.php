<?php

namespace App\Message;

use Symfony\Bridge\Twig\Mime\TemplatedEmail;

class UsersMessage
{
    public function __construct(private TemplatedEmail $filr)
    {
    }

    public function getFile(): TemplatedEmail
    {
        return $this->file;
    }
}
