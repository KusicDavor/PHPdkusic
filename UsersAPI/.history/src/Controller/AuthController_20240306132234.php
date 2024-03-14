<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\LoginFormType;
use App\Form\UserType;
use App\Security\JwtTokenManager;
use Doctrine\ORM\EntityManagerInterface;
use Dompdf\Dompdf;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

class AuthController extends AbstractController
{
    private $passwordEncoder;
    private $jwtManager;
    private $entityManager;
    private $jwtToken;
    private $cache;
    private $tokenStorage;

    public function __construct(EntityManagerInterface $entityManger, UserPasswordHasherInterface $passwordEncoder, JWTTokenManagerInterface $jwtManager, JwtTokenManager $jwtToken, FilesystemAdapter $cache, TokenStorageInterface  $tokenStorage)
    {
        $this->passwordEncoder = $passwordEncoder;
        $this->jwtManager = $jwtManager;
        $this->entityManager = $entityManger;
        $this->jwtToken = $jwtToken;
        $this->cache = $cache;
        $this->tokenStorage = $tokenStorage;
    }

    public function login(Request $request): Response
    {
        // if (!$this->getUser()) {
        //     $form = $this->createForm(LoginFormType::class);
        //     return $this->render('login.html.twig', [
        //         'form' => $form->createView(),
        //     ]);
        // }

        $name = $request->request->get('name');
        $password = $request->request->get('password');

        $user = $this->entityManager->getRepository(User::class)->findOneBy(['name' => $name]);
        if (!$user) {
            return new JsonResponse('Invalid username', Response::HTTP_UNAUTHORIZED);
        }

        if (!$this->passwordEncoder->isPasswordValid($user, $password)) {
            return new JsonResponse(['message' => 'Invalid password'], JsonResponse::HTTP_UNAUTHORIZED);
        }

        $token = new UsernamePasswordToken($user, 'main', $user->getRoles());
        $this->tokenStorage->setToken($token);
        return new JsonResponse(['message' => 'User is now logged in.'], JsonResponse::HTTP_OK);
    }

    public function register(Request $request): JsonResponse
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
        if (null == $this->tokenStorage->getToken()) {
            return new JsonResponse(['message' => 'User is not logged in.'], JsonResponse::HTTP_UNAUTHORIZED);
        }

        $this->tokenStorage->setToken(null);
        return new JsonResponse(['message' => 'User logged out.'], JsonResponse::HTTP_OK);
    }

    public function retrieveUser(): JsonResponse
    {
        $user = $this->getUser();

        if (null === $user) {
            return new JsonResponse(['message' => 'User not logged in.'], Response::HTTP_UNAUTHORIZED);
        }
        return new JsonResponse(['user' => $user->getUserIdentifier()], JsonResponse::HTTP_OK);
    }

    public function exportUsersCsv(): Response
    {
        // if (!$this->getUser()) {
        //     return new Response('Unauthorized', Response::HTTP_UNAUTHORIZED);
        // }

        $users = $this->entityManager->getRepository(User::class)->findAll();

        $response = new StreamedResponse();
        $response->setCallback(function () use ($users) {
            $handle = fopen('php://output', 'w');


            fputcsv($handle, ['Name', 'Contract Start Date', 'Contract End Date', 'Type', 'Verified']);

            foreach ($users as $user) {
                fputcsv($handle, [
                    $user->getName(),
                    $user->getContractStartDate()->format('Y-m-d'),
                    $user->getContractEndDate()->format('Y-m-d'),
                    $user->getType(),
                    $user->isVerified() ? 'Yes' : 'No',
                ]);
            }

            fclose($handle);
        });

        $response->headers->set('Content-Type', 'text/csv');
        $response->headers->set('Content-Disposition', 'attachment; filename="users.csv"');

        return $response;
    }

    public function exportUsersPdf(): Response
    {
        $users = $this->entityManager->getRepository(User::class)->findAll();

        $html = $this->renderView('pdf.html.twig', [
            'users' => $users,
        ]);

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);

        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        return new Response($dompdf->output(), 200, [
            'Content-Type' => 'application/pdf',
        ]);
    }
}
