<?php

namespace App\Entity;

use App\Repository\TeamRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TeamRepository::class)]
class Team
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $teamName = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?User $teamLeader = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?User $projectLeader = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTeamName(): ?string
    {
        return $this->teamName;
    }

    public function setTeamName(string $teamName): static
    {
        $this->teamName = $teamName;

        return $this;
    }

    public function getTeamLeader(): ?User
    {
        return $this->teamLeader;
    }

    public function setTeamLeader(?User $teamLeader): static
    {
        $this->teamLeader = $teamLeader;

        return $this;
    }

    public function getProjectLeader(): ?User
    {
        return $this->projectLeader;
    }

    public function setProjectLeader(?User $projectLeader): static
    {
        $this->projectLeader = $projectLeader;

        return $this;
    }

    /**
     * @return Collection<int, User>
     */


    public function addUser(User $user): static
    {
        if (!$this->users->contains($user)) {
            $this->users->add($user);
            $user->setTeam($this);
        }

        return $this;
    }

    public function removeUser(User $user): static
    {
        if ($this->users->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getTeam() === $this) {
                $user->setTeam(null);
            }
        }

        return $this;
    }
}
