<?php

namespace App\Event;

use App\Entity\VacationRequest;
use Symfony\Contracts\EventDispatcher\Event;

class VacationRequestApprovedEvent extends Event
{
    public const NAME = 'vacation_request.approved';

    private $vacationRequest;

    public function __construct(VacationRequest $vacationRequest)
    {
        $this->vacationRequest = $vacationRequest;
    }

    public function getVacationRequest(): int
    {
        return $this->vacatRequest;
    }
}
