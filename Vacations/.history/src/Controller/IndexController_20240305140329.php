<?php

namespace App\Controller;

use App\Entity\VacationRequest;
use App\Repository\VacationRequestRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class IndexController extends AbstractController
{
    #[Route('/index', name: 'app_index')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $vacationRequests = $entityManager->getRepository(VacationRequest::class)->stats();
        return $this->render('index/index.html.twig', [
            'controller_name' => 'IndexController', [
                ''=> $vacationRequests
            ]
        ]);
    }
}
