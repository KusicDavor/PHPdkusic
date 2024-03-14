<?php

namespace App\Events;

use App\Entity\VacationRequest;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class VacationRequestApprovedListener implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return [
            VacationRequestApprovedEvent::class => 'onVacationRequestApproved',
        ];
    }

    public function onVacationRequestApproved(VacationRequestApprovedEvent $event)
    {
        $vacationRequest = $event->getVacationRequest();
        $startDate = Carbon::parse($$vacationRequest->getStartDate());
            $endDate = Carbon::parse($endDate);
        $endDate = $vacationRequest->getEndDate();

        if ($endDate < $startDate) {
            $context->buildViolation('Ending date cannot be before start date.')
                ->atPath('endDate')
                ->addViolation();
        }
        // Perform actions when both the team leader and project leader approve the request
        // For example, update the request status in the database, send notifications, etc.
    }
}
