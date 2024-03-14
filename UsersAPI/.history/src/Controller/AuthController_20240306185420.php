<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\LoginFormType;
use App\Form\UserType;
use App\Message\UsersMessage;
use Doctrine\ORM\EntityManagerInterface;
use League\Csv\Writer;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
use Mpdf\Mpdf as MpdfMpdf;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\TooManyRequestsHttpException;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class AuthController extends AbstractController
{
    private $passwordEncoder;
    private $jwtManager;
    private $entityManager;
    private $tokenStorage;
    private $bus;
    private const EXPORT_LIMIT = 2;
    private const CACHE_TTL = 60;

    public function __construct(MessageBusInterface $bus, EntityManagerInterface $entityManger, UserPasswordHasherInterface $passwordEncoder, JWTTokenManagerInterface $jwtManager, FilesystemAdapter $cache, TokenStorageInterface  $tokenStorage)
    {
        $this->passwordEncoder = $passwordEncoder;
        $this->jwtManager = $jwtManager;
        $this->entityManager = $entityManger;
        $this->tokenStorage = $tokenStorage;
        $this->bus = $bus;
    }

    public function login(Request $request): Response
    {
        if ($this->getUser()) {
            return new JsonResponse(['message' => 'User is already logged in.'], JsonResponse::HTTP_OK);
        }

        // $form = $this->createForm(LoginFormType::class);
        // $form->handleRequest($request);

        // if ($form->isSubmitted() && $form->isValid()) {
        // $name = $form->get('name')->getData();
        // $password = $form->get('password')->getData();

        $name = $request->get('name');
        $password = $request->get('password');
        $user = $this->entityManager->getRepository(User::class)->findOneBy(['name' => $name]);

        if (!$user) {
            return new JsonResponse('Invalid username', Response::HTTP_UNAUTHORIZED);
        }

        if (!$this->passwordEncoder->isPasswordValid($user, $password)) {
            return new JsonResponse(['message' => 'Invalid password'], JsonResponse::HTTP_UNAUTHORIZED);
        }

        return new JsonResponse(['message' => 'User logged in successfully', 'token' => $user->getApiKey()], JsonResponse::HTTP_OK);
        // }

        // return $this->render('login.html.twig', [
        //     'form' => $form->createView(),
        // ]);
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
            $t = $this->tokenStorage->getToken();
            return new JsonResponse(['message' => 'User successfully registered.'], Response::HTTP_OK);
        }

        return $this->render('registration/register.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    public function logout(): JsonResponse
    {
        if (!$this->tokenStorage->getToken()) {
            return new JsonResponse(['message' => 'User is not logged in.'], Response::HTTP_UNAUTHORIZED);
        }

        $this->tokenStorage->setToken(null);
        $a = $this->tokenStorage->getToken();
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

    public function exportUsersCsv(Request $request): Response
    {
        // if (!$this->getUser()) {
        //     return new Response('Unauthorized', Response::HTTP_UNAUTHORIZED);
        // }

        $cache = new FilesystemAdapter();
        $userIdent = $this->getUser()->getUserIdentifier();
        $cacheItem = $cache->getItem('export_attempts_' . $userIdent);
        $exportAttempts = $cacheItem->get() ?? 0;

        if ($exportAttempts >= self::EXPORT_LIMIT) {
            throw new TooManyRequestsHttpException(self::EXPORT_LIMIT, 'You have exceeded the export limit. Please try again later.');
        }

        $formData = $request->request->all();
        $parameters = [];
        foreach ($formData as $key => $value) {
            $parameters[$key] = $value;
        }

        $users = $this->entityManager->getRepository(User::class)->findByParameters($parameters);
        foreach ($users as &$user) {
            if (isset($user['contractStartDate'])) {
                $user['contractStartDate'] = $user['contractStartDate']->format('Y-m-d H:i:s');
            }

            if (isset($user['contractEndDate'])) {
                $user['contractEndDate'] = $user['contractEndDate']->format('Y-m-d H:i:s');
            }
        }

        $csv = Writer::createFromString();
        $csv->insertOne($parameters);
        $csv->insertAll($users);
        $csvString = $csv->toString();

        $email = (new TemplatedEmail())
            ->from('your_email@example.com')
            ->to('to@example.com')
            ->subject('List of users')
            ->attach($csvString, 'users.csv', 'application/text');

        $this->bus->dispatch(new UsersMessage($email));

        $exportAttempts++;
        $cacheItem->set($exportAttempts)->expiresAfter(self::CACHE_TTL);
        $cache->save($cacheItem);

        return new Response('List of users sent to mail in CSV format.');
    }

    public function exportUsersPdf(Request $request): Response
    {
        // if (!$this->getUser()) {
        //     return new Response('Unauthorized', Response::HTTP_UNAUTHORIZED);
        // }

        $cache = new FilesystemAdapter();
        $userIdent = $this->getUser()->getUserIdentifier();
        $cacheItem = $cache->getItem('export_attempts_' . $userIdent);
        $exportAttempts = $cacheItem->get() ?? 0;

        if ($exportAttempts >= self::EXPORT_LIMIT) {
            throw new TooManyRequestsHttpException(self::EXPORT_LIMIT, 'You have exceeded the export limit. Please try again later.');
        }

        $formData = $request->request->all();
        $parameters = [];
        foreach ($formData as $key => $value) {
            $parameters[$key] = $value;
        }

        $users = $this->entityManager->getRepository(User::class)->findByParameters($parameters);
        foreach ($users as &$user) {
            if (isset($user['contractStartDate'])) {
                $user['contractStartDate'] = $user['contractStartDate']->format('Y-m-d H:i:s');
            }

            if (isset($user['contractEndDate'])) {
                $user['contractEndDate'] = $user['contractEndDate']->format('Y-m-d H:i:s');
            }
        }

        $html = $this->renderView('pdf.html.twig', [
            'users' => $users,
            'parameters' => $parameters
        ]);

        $mpdf = new MpdfMpdf();
        $mpdf->WriteHTML($html);
        $pdf = $mpdf->Output('', 'S');

        $email = (new TemplatedEmail())
            ->from('your_email@example.com')
            ->to('to@example.com')
            ->subject('List of users')
            ->attach($pdf, 'users.pdf', 'application/pdf');

        $this->bus->dispatch(new UsersMessage($email));

        $exportAttempts++;
        $cacheItem->set($exportAttempts)->expiresAfter(self::CACHE_TTL);
        $cache->save($cacheItem);

        return new Response('List of users sent to mail in PDF format.');
    }
}
