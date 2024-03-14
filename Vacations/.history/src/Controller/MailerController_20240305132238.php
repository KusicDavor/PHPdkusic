<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;

final class MailerController extends AbstractController
{
    #[Route('/mailer', name: 'app_mailer')]
    public function sendTestEmail(): JsonResponse
    {
        $message = (new Email())
            ->to('to@xample.com')
            ->from('from@xample.com')
            ->subject('Test email')
            ->text('text');

        $response = $this->transport->send($message);

        return JsonResponse::create(['messageId' => $response->getMessageId()]);
    }
}
