<?php

namespace App\Events;

use App\Entity\VacationRequest;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class VacationRequestApprovedListener implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return [
            VacationRequestApprovedEvent::NAME => 'onVacationRequestApproved',
        ];
    }

    public function onVacationRequestApproved(VacationRequestApprovedEvent $vacationRequest)
    {
        $requestId = $event->getVacationRequest();

        // Perform actions when both the team leader and project leader approve the request
        // For example, update the request status in the database, send notifications, etc.
    }
}
