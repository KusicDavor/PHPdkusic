<?php

namespace App\EventListener;

use App\Entity\VacationRequest;
use App\Event\VacationRequestApprovedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class VacationRequestApprovedSubscriber implements EventSubscriberInterface
{
    private $vacationRequest;
    public function __construct(VacationRequest $vacationRequest)
    {
        $this->vacationRequest = $vacationRequest;
    }

    public static function getSubscribedEvents(): array
    {
        return [
            RequestEvent::class  => 'onKernelRequest',
        ];
    }

    public function onKernelRequest(ExceptionEvent $event): void
    {
        error_log("-------------------------------------------------------------" . $this->vacationRequest);
    }
}
