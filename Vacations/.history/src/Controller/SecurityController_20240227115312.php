<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    #[Route(path: '/login', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // if ($this->getUser()) {
        //     return $this->redirectToRoute('target_path');
        // }

        // get the login error if there is one
        $error = $this->getAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    private function getAuthenticationError(): ?string
    {
        // Check if authentication failed due to missing role
        if ($this->getAuthenticationFailureReason() === 'ROLE_MISSING') {
            return 'You do not have permission to log in.';
        }

        return null;
    }

    private function getAuthenticationFailureReason(): ?string
    {
        $authenticationError = $this->get('security.authentication_utils')->getLastAuthenticationError();
        
        if ($authenticationError instanceof CustomUserMessageAuthenticationException) {
            return $authenticationError->getMessageKey();
        }

        return null;
    }

    #[Route(path: '/logout', name: 'app_logout')]
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}
