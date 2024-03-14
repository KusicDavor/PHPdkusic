<?php

namespace App\Security;

use App\Entity\VacationRequest;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;

class RequestVoter extends Voter
{
    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }
    protected function supports(string $attribute, $subject): bool
    {
        return $attribute === 'EDIT' && $subject instanceof VacationRequest;
    }

    protected function voteOnAttribute(string $attribute, $subject, TokenInterface $token): bool
    {
        $user = $token->getUser();

        // Check if the user has the ROLE_TEAM_LEADER role
        if ($this->security->isGranted('ROLE_TEAM_LEADER')) {
            // Return true to grant access if the user has the required role
            return true;
        }

        // Check if the user has permission to edit the post
        // Implement your logic here, such as checking if the user is the author of the post

        return false; // Return true if the user has permission, false otherwise
    }
}
