<?php
// src/Security/PostVoter.php

namespace App\Security;

use App\Entity\Post;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;

class PostVoter extends Voter
{
    protected function supports(string $attribute, $subject): bool
    {
        return $attribute === 'EDIT' && $subject instanceof Post;
    }

    protected function voteOnAttribute(string $attribute, $subject, TokenInterface $token): bool
    {
        /** @var Post $post */
        $post = $subject;

        // Check if the user has permission to edit the post
        // Implement your logic here, such as checking if the user is the author of the post

        return true; // Return true if the user has permission, false otherwise
    }
}
