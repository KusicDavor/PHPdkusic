<?php

namespace App\Controller;

use App\Entity\VacationRequest;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Contracts\Cache\ItemInterface;

class IndexController extends AbstractController
{
    private $entityManager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/index', name: 'app_index')]
    public function index(): Response
    {
        $cache = new FilesystemAdapter();
        $cachedStats = $cache->get('stats', function (ItemInterface $item) {
            // Fetch the data from the database or wherever you get it from
            $cachedStats = $this->entityManager->getRepository(VacationRequest::class)->getStats();

            // Cache the data for 3600 seconds (1 hour)
            $item->expiresAfter(3600);

            return $stats;
        });


        $cachedStats = $this->entityManager->getRepository(VacationRequest::class)->getStats();
        $cache->getItem('cachedStats')->set($cachedStats)->expiresAfter(60);

        return $this->render('index/index.html.twig', [
            'cachedStats' => $cachedStats,
        ]);
    }
}
