<?php

namespace App\Events;

use App\Entity\VacationRequest;
use Symfony\Component\EventDispatcher\GenericEvent;
use Symfony\Contracts\EventDispatcher\Event;

class VacationRequestDecidedEvent extends GenericEvent
{
    private $vacationRequest;

    public function __construct(VacationRequest $vacationRequest)
    {
        $this->vacationRequest = $vacationRequest;
    }

    public function getVacationRequest(): VacationRequest
    {
        return $this->vacationRequest;
    }
}
