<?php
<?php

namespace App\Message;

use Symfony\Bridge\Twig\Mime\TemplatedEmail;

class VacationRequestMail
{
    public function __construct(private TemplatedEmail $email)
    {
    }

    public function getEmail(): TemplatedEmail
    {
        return $this->email;
    }
}