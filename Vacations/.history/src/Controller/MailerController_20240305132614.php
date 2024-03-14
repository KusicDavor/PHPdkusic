<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Mailer\Transport\TransportInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

final class MailerController extends AbstractController
{
    private TransportInterface $transport;

    public function __construct(TransportInterface $transport)
    {
        $this->transport = $transport;
    }
    #[Route('/mailer', name: 'app_mailer')]
    public function sendTestEmail(): Response
    {
        $message = (new Email())
            ->to('to@xample.com')
            ->from('from@xample.com')
            ->subject('Test email')
            ->text('text');

        $response = $this->transport->send($message);
        return new Response($response, 200);
        // return JsonResponse::create(['messageId' => $response->getMessageId()]);
    }
}
