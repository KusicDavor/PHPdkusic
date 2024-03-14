<?php

namespace App\Events;

use App\Entity\VacationRequest;
use Symfony\Contracts\EventDispatcher\Event;

class VacationRequestApprovedEvent extends Event
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
