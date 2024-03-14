<?php

namespace App\Repository;

use App\Entity\User;
use DateTime;
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
        $beforeAfterEqual = 0;
        if (strpos($parameters['contractStartDate'], '<') !== false) {
            $cleanedStartDate = str_replace('<', '', $parameters['contractStartDate']);
            $parameters['contractStartDate'] = $cleanedStartDate;
            $beforeAfterEqual = -1;
        } else {
            $parameters['contractStartDate'] = DateTime::createFromFormat('d.m.Y', $parameters['contractStartDate']) ?? null;
        }

        if (strpos($parameters['contractStartDate'], '>') !== false) {
            $cleanedStartDate = str_replace('>', '', $parameters['contractStartDate']);
            $parameters['contractStartDate'] = $cleanedStartDate;
            $beforeAfterEqual = 1;
        } else {
            $parameters['contractStartDate'] = DateTime::createFromFormat('d.m.Y', $parameters['contractStartDate']) ?? null;
        }

        if (strpos($parameters['contractEndDate'], '<') !== false) {
            $cleanedEndDate = str_replace('<', '', $parameters['contractEndDate']);
            $parameters['contractEndDate'] = $cleanedEndDate;
            $beforeAfterEqual = -1;
        } else {
            $parameters['contractEndDate'] = DateTime::createFromFormat('d.m.Y', $parameters['contractEndDate']) ?? null;
        }

        if (strpos($parameters['contractEndDate'], '>') !== false) {
            $cleanedEndDate = str_replace('>', '', $parameters['contractEndDate']);
            $parameters['contractEndDate'] = $cleanedEndDate;
            $beforeAfterEqual = 1;
        } else {
            $parameters['contractEndDate'] = DateTime::createFromFormat('d.m.Y', $parameters['contractEndDate']) ?? null;
        }

        $qb = $this->createQueryBuilder('e');
        foreach ($parameters as $key => $value) {
            if (is_null($value) || empty($value)) {
                continue;
            }

            if ($value instanceof DateTime) {
                switch ($beforeAfterEqual) {
                    case -1:
                        $qb->andWhere("e.$key < :$key")
                            ->setParameter($key, $value->format("Y-m-d"));
                        break;

                    case 1:
                        $qb->andWhere("e.$key > :$key")
                            ->setParameter($key, $value->format("Y-m-d"));
                        break;
                    default:
                        $qb->andWhere("e.$key = :$key")
                            ->setParameter($key, $value->format("Y-m-d"));
                        break;
                }
                continue;
            }

            $qb->andWhere("e.$key = :$key")
                ->setParameter($key, $value);
        }

        $users = $qb->getQuery()->getResult();

        $stringUsers = [];
        foreach ($users as $user) {
            $stringUser['Name'] = $user->getName();
            $stringUser['Contract start date'] = $user->getContractStartDate()->format("d.m.Y");
            $stringUser['Contract end date'] = $user->getContractEndDate()->format("d.m.Y");
            $stringUser['Type'] = $user->getType();
            if ($user->getVerified()) {
                $stringUser['Verified'] = "Yes";
            } else {
                $stringUser['Verified'] = "No";
            }
            $stringUsers[] = $stringUser;
        }
        return $stringUsers;
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
