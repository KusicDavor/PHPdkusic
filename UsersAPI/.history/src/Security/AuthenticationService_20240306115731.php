<?php

use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Http\Authenticator\AuthenticatorInterface;

class AuthenticationService
{
    private $tokenStorage;

    public function __construct(TokenStorageInterface  $tokenStorage)
    {
        $this->tokenStorage = $tokenStorage;
    }

    public function authenticateUser(UserInterface $user)
    {
        // Create a token for the user
        $token = new UsernamePasswordToken($user, 'main', $user->getRoles());

        try {
            // Authenticate the token
            // $authenticatedToken = $this->authenticationManager->authenticate($token);

            // Set the authenticated token in the token storage
            $this->tokenStorage->setToken($token)

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
