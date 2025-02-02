<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\Transport\TransportInterface;

class MailerController extends AbstractController
{
    private TransportInterface $transport;

    public function __construct(TransportInterface $transport)
    {
        $this->transport = $transport;
    }

    #[Route('/mailer', name: 'app_mailer')]
    public function sendEmail(TemplatedEmail $mail)
    {

        $response = $this->transport->send($mail);

        // …
        return new Response(
            'Email was sent'
        );
    }
}
