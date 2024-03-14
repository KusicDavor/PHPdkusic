<?php

namespace App\Events;

use App\Entity\User;
use Carbon\Carbon;
use Doctrine\ORM\EntityManager;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class VacationRequestApprovedListener implements EventSubscriberInterface
{
    private $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public static function getSubscribedEvents()
    {
        return [
            VacationRequestApprovedEvent::class => 'onVacationRequestApproved',
        ];
    }

    public function onVacationRequestApproved(VacationRequestApprovedEvent $event, EntityManager $entityManager)
    {
        $vacationRequest = $event->getVacationRequest();
        $startDate = Carbon::parse($vacationRequest->getStartDate());
        $endDate = Carbon::parse($vacationRequest->getEndDate());

        $daysDiff = $startDate->diffInWeekdays($endDate);
        $newVacationDays = $vacationRequest->getUser()->getVacationDays() - $daysDiff;
        $vacationRequest->getUser()->setVacationDays($newVacationDays);

        $this->entityManager->persist($vacationRequest);
        $entityManager->flush();
    }
}
