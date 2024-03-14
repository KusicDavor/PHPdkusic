<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;


class MailerController extends AbstractController
{
    #[Route('/mailer', name: 'app_mailer')]
    public function sendEmail(MailerInterface $mailer)
    {
        $email = (new Email())
        ->from(new Address('mailtrap@example.com'))
        $email = (new Email())
        // ...
        ->text('Hey! Learn the best practices of building HTML emails and play with ready-to-go templates. Mailtrap’s Guide on How to Build HTML Email is live on our blog')
        ->html('<html>
      <body>
        <p>Hey!<br>
           Learn the best practices of building HTML emails and play with ready-to-go templates.</p>
        <p><a href="https://blog.mailtrap.io/build-html-email/">Mailtrap’s Guide on How to Build HTML Email</a> is live on our blog</p>
      </body>
    </html>');
        $mailer->send($email);

        // …
        return new Response(
            'Email was sent'
        );
    }
}
