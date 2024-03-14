<?php

namespace App\Events;

use App\Entity\User;
use App\Entity\VacationRequest;
use Carbon\Carbon;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Serializer\Context\Normalizer\ProblemNormalizerContextBuilder;

class VacationRequestListener implements EventSubscriberInterface
{
    private $entityManager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
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
            dd($vacationRequest);
        }
    }

    public function onVacationRequestApproved(VacationRequest $vacationRequest)
    {
        $startDate = Carbon::parse($vacationRequest->getStartDate());
        $endDate = Carbon::parse($vacationRequest->getEndDate());

        $daysDiff = $startDate->diffInWeekdays($endDate);
        $newVacationDays = $vacationRequest->getUser()->getVacationDays() - $daysDiff;
        $vacationRequest->getUser()->setVacationDays($newVacationDays);

        $this->entityManager->persist($vacationRequest);
        $this->entityManager->flush();
    }

    public function onVacationRequestApproved(VacationRequest $vacationRequest)
    {
        $startDate = Carbon::parse($vacationRequest->getStartDate());
        $endDate = Carbon::parse($vacationRequest->getEndDate());

        $daysDiff = $startDate->diffInWeekdays($endDate);
        $newVacationDays = $vacationRequest->getUser()->getVacationDays() - $daysDiff;
        $vacationRequest->getUser()->setVacationDays($newVacationDays);

        $this->entityManager->persist($vacationRequest);
        $this->entityManager->flush();
    }
}
