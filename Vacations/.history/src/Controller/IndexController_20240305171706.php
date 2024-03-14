<?php

namespace App\Controller;

use Psr\Cache\CacheItemPoolInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Contracts\Cache\CacheInterface;

class IndexController extends AbstractController
{
    private $cache;
    public function __construct(CacheItemPoolInterface $cache)
    {
        // Inject the cache service
        $this->cache = $cache;
    }

    #[Route('/index', name: 'app_index')]
    public function index(): Response
    {
        $cachedStats = $this->cache->('stats')->get();

        // $cache->clear();
        // $cachedStats = $this->entityManager->getRepository(VacationRequest::class)->getStats();
        return $this->render('index/index.html.twig', [
            'cachedStats' => $cachedStats,
        ]);
    }
}
