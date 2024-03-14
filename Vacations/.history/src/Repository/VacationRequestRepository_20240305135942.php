<?php

namespace App\Repository;

use App\Entity\VacationRequest;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<VacationRequest>
 *
 * @method VacationRequest|null find($id, $lockMode = null, $lockVersion = null)
 * @method VacationRequest|null findOneBy(array $criteria, array $orderBy = null)
 * @method VacationRequest[]    findAll()
 * @method VacationRequest[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VacationRequestRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, VacationRequest::class);
    }

    public function stats(): array
    {
        $stats = [];
        $approvedRequestsCount = $this->createQueryBuilder('vr')
            ->select('COUNT(vr.id)')
            ->where('vr.teamLeadAction = :teamLeadAction')
            ->andWhere('vr.projectLeadAction = :projectLeadAction')
            ->setParameter('teamLeadAction', true)
            ->setParameter('projectLeadAction', true)
            ->getQuery()
            ->getSingleScalarResult();

        $declined

        $stats = $approvedRequestsCount;

        $stats = $approvedRequestsCount;
        return $stats;
    }

    //    /**
    //     * @return VacationRequest[] Returns an array of VacationRequest objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('v')
    //            ->andWhere('v.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('v.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?VacationRequest
    //    {
    //        return $this->createQueryBuilder('v')
    //            ->andWhere('v.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
