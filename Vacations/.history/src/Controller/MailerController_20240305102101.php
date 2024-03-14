<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mailer\Transport\TransportInterface;
use Symfony\Component\Mime\Email;

final class SomeController extends AbstractController
{
    private TransportInterface $transport;

    public function __construct(TransportInterface $transport)
    {
        $this->transport = $transport;
    }

    /**
     * @Route(name="send-test-email", path="/test", methods={"GET"})
     *
     * @return JsonResponse
     */
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
