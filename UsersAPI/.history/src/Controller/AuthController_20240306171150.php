<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\LoginFormType;
use App\Form\UserType;
use App\Message\UsersMessage;
use App\Security\JwtTokenManager;
use Doctrine\ORM\EntityManagerInterface;
use Dompdf\Dompdf;
use League\Csv\Writer;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
use mPDF;
use Mpdf\Mpdf as MpdfMpdf;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class AuthController extends AbstractController
{
    private $passwordEncoder;
    private $jwtManager;
    private $entityManager;
    private $jwtToken;
    private $cache;
    private $tokenStorage;
    private $bus;

    public function __construct(MessageBusInterface $bus, EntityManagerInterface $entityManger, UserPasswordHasherInterface $passwordEncoder, JWTTokenManagerInterface $jwtManager, JwtTokenManager $jwtToken, FilesystemAdapter $cache, TokenStorageInterface  $tokenStorage, MailerInterface $mailer)
    {
        $this->passwordEncoder = $passwordEncoder;
        $this->jwtManager = $jwtManager;
        $this->entityManager = $entityManger;
        $this->jwtToken = $jwtToken;
        $this->cache = $cache;
        $this->tokenStorage = $tokenStorage;
        $this->bus = $bus;
    }

    public function login(Request $request): Response
    {
        if ($this->getUser()) {
            return new JsonResponse(['message' => 'User is already logged in.'], JsonResponse::HTTP_OK);
        }

        $form = $this->createForm(LoginFormType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $name = $form->get('name')->getData();
            $password = $form->get('password')->getData();
            $user = $this->entityManager->getRepository(User::class)->findOneBy(['name' => $name]);

            if (!$user) {
                return new JsonResponse('Invalid username', Response::HTTP_UNAUTHORIZED);
            }

            if (!$this->passwordEncoder->isPasswordValid($user, $password)) {
                return new JsonResponse(['message' => 'Invalid password'], JsonResponse::HTTP_UNAUTHORIZED);
            }

            return new JsonResponse(['message' => 'User logged in successfully', 'token' => $user->getApiKey()], JsonResponse::HTTP_OK);
        }

        return $this->render('login.html.twig', [
            'form' => $form->createView(),
        ]);
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

            $this->tokenStorage->setToken($user->getApiKey());
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
        if (!$this->getUser()) {
            return new JsonResponse(['message' => 'User not logged in.'], Response::HTTP_UNAUTHORIZED);
        }

        $user = $this->getUser();
        return new JsonResponse(['user' => $user->getUserIdentifier()], JsonResponse::HTTP_OK);
    }

    public function exportUsersCsv(): Response
    {
        // if (!$this->getUser()) {
        //     return new Response('Unauthorized', Response::HTTP_UNAUTHORIZED);
        // }

        $users = $this->entityManager->getRepository(User::class)->findAll();
        $userData = [];
        foreach ($users as $user) {
            $userData[] = [
                'Name' => $user->getName(),
                'Start date contract' => $user->getContractStartDate()->format('Y-m-d H:i:s'),
                'End date contract' => $user->getContractEndDate()->format('Y-m-d H:i:s'),
                'Type' => $user->getType(),
                'Verified' => $user->getVerified(),
            ];
        }

        $header = ['Name', 'Contract start date', 'Contract end date', 'Type', 'Verified'];
        $csv = Writer::createFromString();
        $csv->insertOne($header);
        $csv->insertAll($userData);
        $csvString = $csv->toString();

        $email = (new TemplatedEmail())
            ->from('your_email@example.com')
            ->to('to@example.com')
            ->subject('List of users')
            ->attach($csvString, 'users.csv', 'application/text');

        $this->bus->dispatch(new UsersMessage($email));

        return new Response('List of users sent to mail in CSV format.');
    }

    public function exportUsersPdf(Request $request): Response
    {
        // if (!$this->getUser()) {
        //     return new Response('Unauthorized', Response::HTTP_UNAUTHORIZED);
        // }

        $formData = $request->request->all();
        $parameters = [];
        foreach ($formData as $key => $value) {
            $parameters[$key] = $key;
        }

        $users = $this->entityManager->getRepository(User::class)->findByParameters($parameters);
        $html = $this->renderView('pdf.html.twig', [
            'users' => $users,
            'parameters' => $parameters
        ]);

        $dompdf = new Dompdf();

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $response = new Response($dompdf->output());
        $response->headers->set('Content-Type', 'application/pdf');
        return $response;

        // $mpdf = new MpdfMpdf();
        // $mpdf->WriteHTML($html);
        // $pdf = $mpdf->Output('', 'S');

        // $email = (new TemplatedEmail())
        //     ->from('your_email@example.com')
        //     ->to('to@example.com')
        //     ->subject('List of users')
        //     ->attach($pdf, 'users.pdf', 'application/pdf');

        // $this->bus->dispatch(new UsersMessage($email));
        // return new Response('List of users sent to mail in PDF format.');
    }
}
