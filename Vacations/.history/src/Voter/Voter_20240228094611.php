<?php

namespace App\Voter;

use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Entity\Entity\User;

class RoleVoter extends Voter
{
    // Define the supported attributes
    const VIEW = 'view';
    const EDIT = 'edit';

    protected function supports($attribute, $subject)
    {
        // Check if the attribute is supported by this voter
        return in_array($attribute, [self::VIEW, self::EDIT]);
    }

    protected function voteOnAttribute($attribute, $subject, TokenInterface $token)
    {
        // Get the current user from the token
        $user = $token->getUser();

        // Check if the user is authenticated
        if (!$user instanceof User) {
            return false;
        }

        // Check the user's roles
        switch ($attribute) {
            case self::VIEW:
                // Allow viewing if the user has ROLE_ADMIN or ROLE_USER
                return in_array('ROLE_ADMIN', $user->getRoles()) || in_array('ROLE_USER', $user->getRoles());
            case self::EDIT:
                // Allow editing if the user has ROLE_ADMIN
                return in_array('ROLE_ADMIN', $user->getRoles());
        }

        return false;
    }
}
