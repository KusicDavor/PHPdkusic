<?php

use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Core\Authentication\AuthenticationManagerInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\User\UserInterface;

class YourAuthenticationService
{
    private $authenticationManager;

    public function __construct(AuthenticationManagerInterface $authenticationManager)
    {
        $this->authenticationManager = $authenticationManager;
    }

    public function authenticateUser(UserInterface $user)
    {
        // Create a token for the user
        $token = new UsernamePasswordToken($user, null, 'main', $user->getRoles());

        try {
            // Authenticate the token
            $authenticatedToken = $this->authenticationManager->authenticate($token);

            // Set the authenticated token in the token storage
            $tokenStorage = $this->container->get('security.token_storage');
            $tokenStorage->setToken($authenticatedToken);

            // Fire the login event (optional)
            // $event = new InteractiveLoginEvent($request, $authenticatedToken);
            // $eventDispatcher = $this->container->get('event_dispatcher');
            // $eventDispatcher->dispatch($event);

            return true;
        } catch (AuthenticationException $e) {
            // Authentication failed
            return false;
        }
    }
}
