<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterfac

class AuthController extends AbstractController
{
    /**
     * @Route("/api/register", name="register", methods={"POST"})
     */
    public function register(Request $request): JsonResponse
    {
        // Handle registration logic
        // Example response
        return new JsonResponse(['message' => 'Register endpoint reached'], JsonResponse::HTTP_OK);
    }

    /**
     * @Route("/api/logout", name="logout", methods={"POST"})
     */
    public function logout(Request $request): JsonResponse
    {
        // Handle logout logic
        // Example response
        return new JsonResponse(['message' => 'Logout endpoint reached'], JsonResponse::HTTP_OK);
    }

    /**
     * @Route("/api/user", name="get_user", methods={"GET"})
     */
    protected function grabUser(): ?UserInterface
    {
        return $this->getUser();
    }
}
