<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTManager;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User implements UserInterface
{
    private $jwtManager;

    public function __construct(JWTManager $jwtManager)
    {
        $this->jwtManager = $jwtManager;
    }

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private $id;

    #[ORM\Column(type: "string", length: 255)]
    private $name;

    #[ORM\Column(type: "string", length: 255)]
    private $password;

    #[ORM\Column(type: "datetime")]
    private $contractStartDate;

    #[ORM\Column(type: "datetime")]
    private $contractEndDate;

    #[ORM\Column(type: "string", length: 255)]
    private $type;

    #[ORM\Column(type: "boolean")]
    private $verified;

    #[ORM\OneToOne(mappedBy: 'userToken', cascade: ['persist', 'remove'])]
    private ?TokenDatabase $token = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getContractStartDate(): ?\DateTimeInterface
    {
        return $this->contractStartDate;
    }

    public function setContractStartDate(\DateTimeInterface $contractStartDate): self
    {
        $this->contractStartDate = $contractStartDate;

        return $this;
    }

    public function getContractEndDate(): ?\DateTimeInterface
    {
        return $this->contractEndDate;
    }

    public function setContractEndDate(\DateTimeInterface $contractEndDate): self
    {
        $this->contractEndDate = $contractEndDate;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getVerified(): ?bool
    {
        return $this->verified;
    }

    public function setVerified(bool $verified): self
    {
        $this->verified = $verified;

        return $this;
    }

    public function isVerified(): ?bool
    {
        return $this->verified;
    }

    public function getUserIdentifier(): string
    {
        return (string) $this->name;
    }

    public function generateToken(User $user): string
    {
        $token = $this->jwtManager->create($user);
        return $token;
    }

    public function eraseCredentials(): void
    public function getRoles():
}
