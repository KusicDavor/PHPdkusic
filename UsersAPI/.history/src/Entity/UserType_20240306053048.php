<?php

namespace App\Entity;

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
