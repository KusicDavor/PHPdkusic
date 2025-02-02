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
        $stats = $entityManager->getRepository(VacationRequest::class)->stats();
        $tekst = "tu sam";

        $variableToPass = 'Hello from index.html.twig!';

        // Render the index.html.twig template, passing the variable
        return $this->render('index/index.html.twig', [
            'tekst' => $tekst,
        ]);
    }
}
