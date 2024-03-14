<?php_ini_loaded_file()// src/Event/VacationRequestApprovedEvent.php

namespace App\Event;

use Symfony\Contracts\EventDispatcher\Event;

class VacationRequestApprovedEvent extends Event
{
public const NAME = 'vacation_request.approved';

private $requestId;

public function __construct(int $requestId)
{
$this->requestId = $requestId;
}

public function getRequestId(): int
{
return $this->requestId;
}
}