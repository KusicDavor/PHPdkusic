<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Security\User\UserLoaderInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User implements UserLoaderInterface
{
    private $email;

    public function getUsername()
    {
        return $this->email;
    }
    3 public function setEmail($email)
    {
        $this->email = $email;
    }

}
