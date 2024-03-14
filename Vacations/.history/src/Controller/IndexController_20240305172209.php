<?php

namespace App\Controller;

use App\Entity\VacationRequest;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class IndexController extends AbstractController
{
    private $entityManager;
    public function __construct(EntityManagerInterface $entityManager) {
        $this->entityManager = $entityManager;
    }
    #[Route('/index', name: 'app_index')]
    public function index(): Response
    {
        $cache = new FilesystemAdapter();
        $cachedStats = $this->entityManager->getRepository(VacationRequest::class)->getStats();
        $cachedStats->getItem('cachedStats')->set($cachedStats)->expiresAfter(3600);

        // $cache->clear();
        // 
        return $this->render('index/index.html.twig', [
            'cachedStats' => $cachedStats,
        ]);
    }
}
