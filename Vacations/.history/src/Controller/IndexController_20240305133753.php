<?php

namespace App\Controller;

use App\Repository\VacationRequestRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class IndexController extends AbstractController
{
    #[Route('/index', name: 'app_index')]
    public function index(EntityManager $entityManager): Response
    {
        $$entityManager->getRepository(VacationRequestRepository::class)->findAll();
        return $this->render('index/index.html.twig', [
            'controller_name' => 'IndexController',
        ]);
    }
}
