<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class IndexController extends AbstractController


    #[Route('/index', name: 'app_index')]
    public function index(): Response
    {
        $cachedStats = $this->cache->retrieveFromCache('stats')->get();

        // $cache->clear();
        // $cachedStats = $this->entityManager->getRepository(VacationRequest::class)->getStats();
        return $this->render('index/index.html.twig', [
            'cachedStats' => $cachedStats,
        ]);
    }
}
