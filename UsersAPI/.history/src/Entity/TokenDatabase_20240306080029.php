<?php

namespace App\Entity;

use App\Repository\TokenDatabaseRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TokenDatabaseRepository::class)]
class TokenDatabase
{
    private $jwtManager;
    
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(inversedBy: 'token', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $userToken = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserToken(): ?User
    {
        return $this->userToken;
    }

    public function setUserToken(User $userToken): static
    {
        $this->userToken = $userToken;

        return $this;
    }
}
