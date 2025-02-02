<?php

namespace App\Controller;

use App\Entity\VacationRequest;
use App\Repository\VacationRequestRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Contracts\Cache\ItemInterface;

class IndexController extends AbstractController
{
    #[Route('/index', name: 'app_index')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $stats = $entityManager->getRepository(VacationRequest::class)->getStats();
        $cache = new FilesystemAdapter();
        $cachedStats = $cache->get('stats', function (ItemInterface $item) {
            // Cache the data for 3600 seconds (1 hour)
            $item->expiresAfter(3600);
            return $stats;
        });

        return $this->render('index.html.twig', [
            'cachedStats' => $cachedStats,
        ]);


        return $this->render('index/index.html.twig', [
            'stats' => $stats,
        ]);
    }
}
