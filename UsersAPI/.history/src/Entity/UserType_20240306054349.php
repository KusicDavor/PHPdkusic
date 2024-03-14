<?php

namespace App\Entity;

enum type: string
{
    case normal = "DRAFT";
    case premium = "PENDING_MODERATED";
    case Published = "PUBLISHED";
}
