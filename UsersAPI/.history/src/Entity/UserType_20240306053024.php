<?php
<?php

namespace App\Entity;

use Doctrine\DBAL\Types\EnumType;

class UserType extends EnumType
{
    public function getName()
    {
        return 'user_type';
    }

    public function getValues()
    {
        return ['normal', 'premium'];
    }
}
