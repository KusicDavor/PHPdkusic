<?php

// src/Controller/AuthController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class AuthController extends AbstractController
{
    public function login(Request $request): JsonResponse
    {
        // Your login logic here

        // Example response
        return new JsonResponse(['message' => 'Login endpoint reached'], JsonResponse::HTTP_OK);
    }
}
