<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\VacationRequest;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Mailer\Transport\TransportInterface;
use Symfony\Component\Routing\Annotation\Route;

final class MailerController extends AbstractController
{
    private TransportInterface $transport;

    public function __construct(TransportInterface $transport)
    {
        $this->transport = $transport;
    }
    #[Route('/mailer', name: 'app_mailer')]
    public function sendEmail()
    {
        // $message = (new Email())
        //     ->to('to@xample.com')
        //     ->from('from@xample.com')
        //     ->subject('Test email')
        //     ->text('text');


        $email = (new TemplatedEmail())
            ->to('davor.kusic@factory.dev')
            ->from('davor.kusic@factory.dev')
            ->subject('Request Approved')
            ->text('Your request has been approved.');
            ->htmlTemplate('email/requestApproved.html.twig');
        // ->context([
        //     'user' => $user,
        //     'vacationRequest' => $vacationRequest
        // ]);

        $this->transport->send($email);
        // return JsonResponse::create(['messageId' => $response->getMessageId()]);
    }
}
