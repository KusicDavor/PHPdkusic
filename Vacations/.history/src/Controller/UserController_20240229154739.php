<?php

namespace App\Controller;

use App\Entity\Team;
use App\Entity\User;
use App\Form\UserType;
use App\Repository\TeamRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/users')]
class UserController extends AbstractController
{
    #[Route('/', name: 'app_user_index', methods: ['GET'])]
    public function index(UserRepository $userRepository): Response
    {
        return $this->render('user/index.html.twig', [
            'users' => $userRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_user_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager, UserPasswordHasherInterface $userPasswordHasher): Response
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('password')->getData(),
                )
            );

            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('user/new.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_user_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, User $user, EntityManagerInterface $entityManager, UserPasswordHasherInterface $passwordEncoder): Response
    {
        $oldTeam = $user->getTeam();

        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        $newPassword = $form->get('password')->getData();
        if (!empty($newPassword)) {
            $encodedPassword = $passwordEncoder->hashPassword($user, $newPassword);
            $user->setPassword($encodedPassword);
        }

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();

            // ispravi teamLeadera, projectLeadera, usere u timu ako se korisnik prebaci u drugi tim
            if ($oldTeam !== $user->getTeam()) {
                if (is_null($oldTeam)) {
                    $this->addUserToTeam($user);
                } else {
                    
                }
                $this->checkOnTeamChange($oldTeam, $user, $entityManager);
            }

            $entityManager->persist($user);
            $entityManager->flush();
            return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('user/edit.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_user_delete', methods: ['POST'])]
    public function delete(Request $request, User $user, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $user->getId(), $request->request->get('_token'))) {
            $entityManager->remove($user);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
    }


    private function checkOnTeamChange(?Team $oldTeam, User $newUser, EntityManagerInterface $entityManager): void
    {
        if ($oldTeam->getTeamLeader() === $newUser) {
            $oldTeam->setTeamLeader(null);
        }

        if ($oldTeam->getProjectLeader() === $newUser) {
            $oldTeam->setProjectLeader(null);
        }

        if (is_null($newUser->getTeam())) {
            return;
        }

        // dodaj usera u novi tim (jer ne povlači automatski iz nekog razloga)
        $teamRepository = $entityManager->getRepository(Team::class);
        $team = $teamRepository->find($newUser->getTeam()->getId());
        if ($newUser->getTeam()) {
            $newUser->getTeam()->addUser($newUser);
        }

        $entityManager->persist($oldTeam);
        $entityManager->flush();
    }
}
