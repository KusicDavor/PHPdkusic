<?php

namespace App\Entity;

enum type: string
{
    case Draft = "DRAFT";
    case PendingModerated = "PENDING_MODERATED";
    case Published = "PUBLISHED";
}
