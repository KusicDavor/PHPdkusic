<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
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
        // $apiToken = $request->headers->get('Authorization');

        // // Extract the user identifier from the API token (this is just an example, replace it with your actual logic)
        // $userIdentifier = substr($apiToken, 7); // Assuming the token format is "Bearer {token}"

        // // Use the user identifier to look up the corresponding user in the database
        // // You can use Doctrine or any other ORM or database query method to fetch the user
        // $user = $this->entityManager->getRepository(User::class)->findOneBy(['apiToken' => $userIdentifier]);

        // // Check if the user exists
        // if (!$user) {
        //     // Handle the case where the user is not found
        //     throw new \Exception('User not found');
        // }

        // dd($user);
        // return new JsonResponse(['message' => 'User successfully logged in'], JsonResponse::HTTP_OK);

        // Example response
        return new JsonResponse(['message' => 'Login endpoint reached'], JsonResponse::HTTP_OK);
    }

    public function register(Request $request): Response
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user->setPassword(password_hash($user->getPassword(), PASSWORD_ARGON2ID));
            $token = $this->jwtManager->create($user);
            $user->setToken($token);

            $this->entityManager->persist($user);
            $this->entityManager->flush();
        }

        return $this->render('templates/regis/register.html.twig', [
            'form' => $form->createView(),
        ]);
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
