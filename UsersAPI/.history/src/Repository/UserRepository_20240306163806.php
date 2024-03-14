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

    public function findByParameters(array $parameters)
    {
        $qb = $this->createQueryBuilder('e');

        foreach ($parameters as $key => $value) {
            // Customize this condition based on your requirements
            switch ($key) {
                case 'name':
                    $qb->andWhere($qb->expr()->like('e.name', ":$key"))
                        ->setParameter($key, "%$value%");
                    break;
                case 'contractStartDate':
                case 'contractEndDate':
                    $qb->andWhere("e.$key = :$key")
                        ->setParameter($key, new \DateTime($value)); // Assuming $value is in a valid date format
                    break;
                    // Add cases for other parameters as needed
                default:
                    // Handle other parameters according to your requirements
                    break;
            }
        }

        $q = $qb->getQuery();
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
