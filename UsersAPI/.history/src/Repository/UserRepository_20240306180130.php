<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<User>
 *
 * @method User|null find($id, $lockMode = null, $lockVersion = null)
 * @method User|null findOneBy(array $criteria, array $orderBy = null)
 * @method User[]    findAll()
 * @method User[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    public function findByParameters(array $parameters): array
    {
        $qb = $this->createQueryBuilder('e');

        foreach ($parameters as $key => $value) {
            switch ($key) {
                case 'name':
                    $qb->andWhere('e.name = :name')
                        ->setParameter('name', $key);
                    break;
                case 'start_contract_date':
                    $qb->andWhere('e.contractStartDate = :start_contract_date')
                        ->setParameter('start_contract_date', new \DateTime($key));
                    break;
                case 'end_contract_date':
                    $qb->andWhere('e.contractEndDate = :contractEndDate')
                        ->setParameter('contractEndDate', $key);
                    break;
                case 'type':
                    $qb->andWhere('e.type = :type')
                        ->setParameter('type', $key);
                    break;
                case 'verified':
                    $qb->andWhere('e.verified = :verified')
                        ->setParameter('verified', $key);
                    break;
            }
        }

        return $qb->getQuery()->getResult();
    }

    //    /**
    //     * @return User[] Returns an array of User objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('u')
    //            ->andWhere('u.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('u.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?User
    //    {
    //        return $this->createQueryBuilder('u')
    //            ->andWhere('u.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
