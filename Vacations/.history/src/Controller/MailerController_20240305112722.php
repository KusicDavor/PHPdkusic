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
    public function sendEmail(MailerInterface $mailer, TemplatedEmail $mail)
    {
        $this->sendMail($mailer, $vacationRequest);
        $this->transport->send($mail);
        // …
        return new Response(
            'Email was sent'
        );
    }

    private function sendMail(MailerInterface $mailer, VacationRequest $vacationRequest): void
    {
        $user = $vacationRequest->getUser();
        $email = (new TemplatedEmail())
            ->to('to@example.com')
            ->from('from@example.com')
            ->subject('Request Approved')
            ->text('Your request has been approved.')
            ->htmlTemplate('email/requestApproved.html.twig')
            ->context([
                'user' => $user,
                'vacationRequest' => $vacationRequest
            ]);
        $mailer->send($email);
    }
}
