<?php

namespace App\Events;

use App\Entity\User;
use App\Entity\VacationRequest;
use Carbon\Carbon;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Serializer\Context\Normalizer\ProblemNormalizerContextBuilder;

class VacationRequestListener implements EventSubscriberInterface
{
    private $entityManager;
    private $mailer;
    public function __construct(EntityManagerInterface $entityManager, MailerInterface $mailer)
    {
        $this->entityManager = $entityManager;
        $this->mailer = $mailer;
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
    }

    private function onVacationRequestApproved(VacationRequest $vacationRequest)
    {
        $startDate = Carbon::parse($vacationRequest->getStartDate());
        $endDate = Carbon::parse($vacationRequest->getEndDate());

        $daysDiff = $startDate->diffInWeekdays($endDate);
        $newVacationDays = $vacationRequest->getUser()->getVacationDays() - $daysDiff;
        $vacationRequest->getUser()->setVacationDays($newVacationDays);

        $this->entityManager->persist($vacationRequest);
        $this->entityManager->flush();

        $email = (new Email())
            ->from('from@example.com')
            ->to('to@example.com')
            ->subject('Request Approved')
            ->text('Your request has been approved.');
        $this->mailer->send($email);
    }

    private function onVacationRequestDeclined(VacationRequest $vacationRequest)
    {
        $this->sendMail();
    }

    private function sendMail()
    {
        // dd('tu sam');
    }
}
