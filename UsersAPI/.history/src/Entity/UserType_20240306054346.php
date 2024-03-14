<?php

namespace App\Entity;

enum type: string
{
    case normal = "DRAFT";
    case PendingModerated = "PENDING_MODERATED";
    case Published = "PUBLISHED";
}
