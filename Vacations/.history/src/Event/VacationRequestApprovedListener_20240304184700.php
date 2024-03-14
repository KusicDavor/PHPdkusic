<?php

namespace App\EventListener;

use App\Event\VacationRequestApprovedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class VacationRequestApprovedListener implements EventSubscriberInterface
{
    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::EXCEPTION => [
                'updateVacationDays' => ,
            ]
        ];
    }

    public function onVacationRequestApproved(VacationRequestApprovedEvent $event)
    {
        $requestId = $event->getRequestId();
    }
}
