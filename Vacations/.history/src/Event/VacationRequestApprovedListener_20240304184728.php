<?php

namespace App\EventListener;

use App\Event\VacationRequestApprovedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\KernelEvents;

class VacationRequestApprovedListener implements EventSubscriberInterface
{
    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::EXCEPTION => [
                'updateVacationDays' => 0,
            ]
        ];
    }

    public function processException(ExceptionEvent $event): void
    {
        // ...
    }
}
