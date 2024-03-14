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
    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function getRoles()
    {
        return ['ROLE_USER'];
    }
    public function getPassword()
    {
        // leaving blank - I don't need/have a password!
    }
    public function getSalt()
    {
        // leaving blank - I don't need/have a password!
    }
    public function eraseCredentials()
    {
        // leaving blank - I don't need/have a password!
    }
}
