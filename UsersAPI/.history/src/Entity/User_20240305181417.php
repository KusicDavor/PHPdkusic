<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User implements UserInterface
{
    private $email;
    // needed by the security system
    public function getUsername()
    {
        return $this->email;
    }
    // ... lines 17 - 46
}
