<?php

namespace App\Events;

use App\Entity\VacationRequest;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class VacationRequestApprovedListener implements EventSubscriberInterface
{
    private $vacationRequest;

    public function __construct(VacationRequest $vacationRequest)
    {
        $this->vacationRequest = $vacationRequest;
    }

    public static function getSubscribedEvents()
    {
        return [
            VacationRequestApprovedEvent::NAME => 'onVacationRequestApproved',
        ];
    }

    public function onVacationRequestApproved()
    {
        dump($vacationRequest);
        // $requestId = $event->getVacationRequest();

        // Perform actions when both the team leader and project leader approve the request
        // For example, update the request status in the database, send notifications, etc.
    }
}
