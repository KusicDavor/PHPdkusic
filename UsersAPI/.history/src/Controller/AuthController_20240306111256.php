<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Security\JwtTokenManager;
use Doctrine\ORM\EntityManagerInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
use Psr\Cache\CacheItemPoolInterface;
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
    private $jwtToken;
    

    public function __construct(EntityManagerInterface $entityManger, UserPasswordHasherInterface $passwordEncoder, JWTTokenManagerInterface $jwtManager, JwtTokenManager $jwtToken)
    {
        $this->passwordEncoder = $passwordEncoder;
        $this->jwtManager = $jwtManager;
        $this->entityManager = $entityManger;
        $this->jwtToken = $jwtToken;
        $
    }

    public function login(Request $request): Response
    {
        $name = $request->request->get('name');
        $password = $request->request->get('password');
        $apiKey = $request->headers->get('X-AUTH-TOKEN');

        $user = $this->entityManager->getRepository(User::class)->findOneBy(['name' => $name]);
        if (!$user) {
            return new JsonResponse('Invalid username', Response::HTTP_UNAUTHORIZED);
        }

        if (!$this->passwordEncoder->isPasswordValid($user, $password)) {
            return new JsonResponse(['message' => 'Invalid password'], JsonResponse::HTTP_UNAUTHORIZED);
        }

        $this->jwtToken->saveTokenToCache($apiKey);
        return new JsonResponse(['message' => 'Login endpoint reached'], JsonResponse::HTTP_OK);
    }

    public function register(Request $request): Response
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user->setPassword(password_hash($user->getPassword(), PASSWORD_ARGON2ID));
            $user->setApiKey($this->jwtManager->create($user));

            $this->entityManager->persist($user);
            $this->entityManager->flush();

            return new JsonResponse(['message' => 'User successfully registered.'], Response::HTTP_OK);
        }

        return $this->render('registration/register.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    public function logout(): JsonResponse
    {
        if ($this->cache->getItem('cacheToken')) {
            $cs = $this->cache->getItem('cacheToken');
            $this->cache->deleteItem('cacheItem');
            return new JsonResponse(['message' => 'Logout endpoint reached'], JsonResponse::HTTP_OK);
        }
        return new JsonResponse(['message' => 'There has been an issue logging out.'], JsonResponse::HTTP_NOT_FOUND);
    }

    public function retrieveUser(): JsonResponse
    {
        $user = $this->getUser();
        return new JsonResponse(['user' => $user], JsonResponse::HTTP_OK);
    }

    // putanja za dohvat korisnika
}
