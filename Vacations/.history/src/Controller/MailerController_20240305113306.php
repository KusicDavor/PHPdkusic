<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\Transport\TransportInterface;

class MailerController extends AbstractController
{
    #[Route('/mailer', name: 'app_mailer')]
    public function sendEmail(TemplatedEmail $mail)
    {
        $email = (new TemplatedEmail())
            ->to('to@xample.com')
            ->from('from@xample.com')
            ->subject('Request Approved')
            ->text('Your request has been approved.');
        // ->htmlTemplate('email/requestApproved.html.twig')
        // ->context([
        //     'user' => $user,
        //     'vacationRequest' => $vacationRequest
        // ]);
        $email->
        $response = $this->transport->send($mail);

        // …
        return new Response(
            'Email was sent'
        );
    }
}
