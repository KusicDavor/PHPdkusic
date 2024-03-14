<?php

namespace App\Events;

use App\Controller\MailerController;
use App\Entity\VacationRequest;
use App\Message\SmsNotification;
use Carbon\Carbon;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mailer\Transport\TransportInterface;

class VacationRequestListener implements EventSubscriberInterface
{
    private $entityManager;
    private $transport;
    public function __construct(EntityManagerInterface $entityManager, TransportInterface $transport)
    {
        $this->entityManager = $entityManager;
        $this->transport = $transport;
    }

    public static function getSubscribedEvents()
    {
        return [
            VacationRequestDecidedEvent::class => 'checkVacationStatus',
        ];
    }

    public function checkVacationStatus(VacationRequestDecidedEvent $event)
    {
        $vacationRequest = $event->getVacationRequest();
        if ($vacationRequest->isTeamLeadAction() && $vacationRequest->isProjectLeadAction()) {
            $this->onVacationRequestApproved($vacationRequest);
        } elseif (!$vacationRequest->isProjectLeadAction() || !$vacationRequest->isProjectLeadAction()) {
            $this->onVacationRequestDeclined($vacationRequest);
        }

        $this->entityManager->persist($vacationRequest);
        $this->entityManager->flush();
    }

    private function onVacationRequestApproved(VacationRequest $vacationRequest)
    {
        $startDate = Carbon::parse($vacationRequest->getStartDate());
        $endDate = Carbon::parse($vacationRequest->getEndDate());

        $daysDiff = $startDate->diffInWeekdays($endDate);
        $newVacationDays = $vacationRequest->getUser()->getVacationDays() - $daysDiff;
        $vacationRequest->getUser()->setVacationDays($newVacationDays);

        $user = $vacationRequest->getUser();
        $email = (new TemplatedEmail())
            ->to('to@xample.com')
            ->from('from@xample.com')
            ->subject('Request Approved')
            ->text('Your request has been approved.')
            ->htmlTemplate('email/requestApproved.html.twig')
            ->context([
                'user' => $user,
                'vacationRequest' => $vacationRequest
            ]);
        $bus->dispatch(new SmsNotification($vacationRequest));
        $this->transport->send($email);
        return;
    }

    private function onVacationRequestDeclined(VacationRequest $vacationRequest)
    {
        $user = $vacationRequest->getUser();
        $email = (new TemplatedEmail())
            ->to('to@xample.com')
            ->from('from@xample.com')
            ->subject('Request Declined')
            ->text('Your request has been declined.')
            ->htmlTemplate('email/requestDeclined.html.twig')
            ->context([
                'user' => $user,
                'vacationRequest' => $vacationRequest
            ]);
        $this->transport->send($email);
        return;
    }
}
