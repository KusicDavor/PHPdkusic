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
    private $entityManager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/index', name: 'app_index')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $cache = new FilesystemAdapter();
        $cachedStats = $cache->function (ItemInterface $item) {


            $item->expiresAfter(1);
            return $stats;
        });

        $stats = $this->entityManager->getRepository(VacationRequest::class)->getStats();

        return $this->render('index/index.html.twig', [
            'stats' => $stats,
        ]);
    }
}
