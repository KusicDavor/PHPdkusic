<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class AuthController extends AbstractController
{

    public function login(Request $request): JsonResponse
    {
        // Your login logic here

        // Example response
        return new JsonResponse(['message' => 'Login endpoint reached'], JsonResponse::HTTP_OK);
    }

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

    // putanja za dohvat korisnika
}
