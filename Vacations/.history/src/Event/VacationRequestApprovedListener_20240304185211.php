<?php

namespace App\EventListener;

use App\Event\VacationRequestApprovedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class VacationRequestApprovedSubsvcmplements EventSubscriberInterface
{
    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::RESPONSE => 'updateVacationDays',
        ];
    }

    public function updateVacationDays(ExceptionEvent $event): void
    {
        $user = 1;
    }
}
