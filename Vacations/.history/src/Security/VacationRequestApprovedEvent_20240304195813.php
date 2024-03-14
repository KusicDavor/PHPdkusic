<?php

namespace App\Security;

use App\Entity\VacationRequest;
use Symfony\Contracts\EventDispatcher\Event;

class VacationRequestApprovedEvent extends Event
{
    public const NAME = 'vacation_request.approved';

    private $vacationRequest;

    public function __construct()
    {
        $this->vacationRequest = $vacationRequest;
    }

    public function getVacationRequest(): VacationRequest
    {
        return $this->vacationRequest;
    }
}
