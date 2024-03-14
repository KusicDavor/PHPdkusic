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
        $data = json_decode($request->getContent(), true);
        $name = $data['name'] ?? null;
        $password = $data['password'] ?? null;

        
       
        return new JsonResponse(['message' => 'Login endpoint reached'], JsonResponse::HTTP_OK);
    }

    public function register(Request $request): JsonResponse
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user->setPassword(password_hash($user->getPassword(), PASSWORD_ARGON2ID));
            $token = $this->jwtManager->create($user);

            $this->entityManager->persist($user);
            $this->entityManager->flush();
        }

        return $this->render('registration/register.html.twig', [
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
