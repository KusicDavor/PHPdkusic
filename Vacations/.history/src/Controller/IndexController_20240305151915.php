<?php

namespace App\Controller;

use App\Entity\VacationRequest;
use App\Repository\VacationRequestRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class IndexController extends AbstractController
{
    #[Route('/index', name: 'app_index')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $stats = $entityManager->getRepository(VacationRequest::class)->stats();

        $cache = new FilesystemAdapter();
        $cache->get('stats', function ($item) use ($stats) {
            $item->expiresAfter(3600); // Cache for 1 hour
            return $stats;
        });

        return $this->render('index/index.html.twig', [
            'stats' => $stats,
        ]);
    }
}
