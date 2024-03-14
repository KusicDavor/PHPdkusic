<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class IndexController extends AbstractController
{
    private $cache;
    public function __construct(FilesystemAdapter $cache)
    {
        // Inject the cache service
        $this->cache = $cache;
    }

    #[Route('/index', name: 'app_index')]
    public function index(): Response
    {
        $cachedStats = $this->cache->getItem('your_cache_key')->get();

        // $cache->clear();
        // $cachedStats = $this->entityManager->getRepository(VacationRequest::class)->getStats();
        return $this->render('index/index.html.twig', [
            'cachedStats' => $cachedStats,
        ]);
    }
}
