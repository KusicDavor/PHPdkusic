<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AuthController extends AbstractController
{
    private $passwordEncoder;
    private $jwtManager;
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManger, UserPasswordHasherInterface $passwordEncoder, JWTTokenManagerInterface $jwtManager)
    {
        $this->passwordEncoder = $passwordEncoder;
        $this->jwtManager = $jwtManager;
        $this->entityManager = $entityManger;
    }

    public function login(Request $request): JsonResponse
    {
        $apiToken = $request->headers->get('Authorization');

        // Extract the user identifier from the API token (this is just an example, replace it with your actual logic)
        $userIdentifier = substr($apiToken, 7); // Assuming the token format is "Bearer {token}"

        // Use the user identifier to look up the corresponding user in the database
        // You can use Doctrine or any other ORM or database query method to fetch the user
        $user = $this->entityManager->getRepository(User::class)->findOneBy(['apiToken' => $userIdentifier]);

        // Check if the user exists
        if (!$user) {
            // Handle the case where the user is not found
            throw new \Exception('User not found');
        }

        dd($user);
        // Return the user identifier
        return new JsonResponse(['message' => 'User successfuly endpoint reached'], JsonResponse::HTTP_OK);

        // Example response
        // return new JsonResponse(['message' => 'Login endpoint reached'], JsonResponse::HTTP_OK);
    }

    public function register(Request $request): JsonResponse
    {
        // Handle registration logic
        // Example response
        return new JsonResponse(['message' => 'Register endpoint reached'], JsonResponse::HTTP_OK);
    }

    public function logout(Request $request): JsonResponse
    {
        // Handle logout logic
        // Example response
        return new JsonResponse(['message' => 'Logout endpoint reached'], JsonResponse::HTTP_OK);
    }

    public function retrieveUser(): JsonResponse
    {
        $user = $this->getUser();
        return new JsonResponse(['user' => $user], JsonResponse::HTTP_OK);
    }

    // putanja za dohvat korisnika
}
