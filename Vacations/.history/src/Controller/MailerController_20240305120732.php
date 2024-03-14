<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\Bridge\Google\Transport\GmailTransportFactory;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mailer\MailerInterface;


class MailerController extends AbstractController
{
    #[Route('/mailer', name: 'app_mailer')]
    public function sendEmail(MailerInterface $mailer)
    {
        $email = (new TemplatedEmail())
            ->to('davor.kusic@factory.dev')
            ->from('davor.kusic@factory.dev')
            ->subject('Request Approved')
            ->text('Your request has been approved.');
        // ->htmlTemplate('email/requestApproved.html.twig')
        // ->context([
        //     'user' => $user,
        //     'vacationRequest' => $vacationRequest
        // ]);
        $mailer->send($email);

        // …
        return new Response(
            'Email was sent'
        );
    }
}
