<?php

namespace App\Controller;

use App\Entity\VacationRequest;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;


class MailerController extends AbstractController
{
    #[Route('/mailer', name: 'app_mailer')]
    public function sendEmail(MailerInterface $mailer, VacationRequest $vacationRequest): Response
    {
        $user = $this->getUser();

        $email = (new TemplatedEmail())
            ->from('vacationsM@factory.com')
            ->to('davor.kusic@factory.dev')
            ->subject('Experimenting with Symfony Mailer and Mailtrap')
            ->htmlTemplate('email/requestApproved.html.twig')
            ->context([
                'user' => $user,
                'vacationRequest' => $vacationRequest
            ]);

        $mailer->send($email);

        return new Response(
            'Email was sent'
        );
    }

    public function sendDeclineMail(MailerInterface $mailer, VacationRequest $vacationRequest): Response
    {
        $user = $this->getUser();

        $email = (new TemplatedEmail())
            ->from('vacationsM@factory.com')
            ->to('davor.kusic@factory.dev')
            ->subject('Experimenting with Symfony Mailer and Mailtrap')
            ->htmlTemplate('email/requestApproved.html.twig')
            ->context([
                'user' => $user,
                'vacationRequest' => $vacationRequest
            ]);

        $email = (new TemplatedEmail())
            ->from('vacationsM@factory.dev')
            ->to('davor.kusic@factory.dev')
            ->subject('Request Declined')
            ->text('Your request has been declined.')
            ->htmlTemplate('email/requestDeclined.html.twig')
            ->context([
                'user' => $user,
                'vacationRequest' => $vacationRequest
            ]);

        $mailer->send($email);

        return new Response(
            'Email was sent'
        );
    }
}
