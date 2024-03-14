<?php

namespace App\Message;

use App\Entity\VacationRequest;
use AsyncAws\Ses\ValueObject\Template;
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
