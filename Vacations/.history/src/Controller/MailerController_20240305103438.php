<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;


class MailerController extends AbstractController
{
    #[Route('/mailer', name: 'app_mailer')]
    public function sendEmail(MailerInterface $mailer)
    {
        $email = (new TemplatedEmail())
            ->from('vacationsM@factory.com')
            ->to('dkusic@factory.com')
            ->subject('Experimenting with Symfony Mailer and Mailtrap')
            ->htmlTemplate('email/experiment.html.twig');

        $mailer->send($email);

        // …
        return new Response(
            'Email was sent'
        );
    }
}
