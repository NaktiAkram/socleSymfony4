<?php

namespace App\Repository;

use App\Entity\StatefulSet;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method StatefulSet|null find($id, $lockMode = null, $lockVersion = null)
 * @method StatefulSet|null findOneBy(array $criteria, array $orderBy = null)
 * @method StatefulSet[]    findAll()
 * @method StatefulSet[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StatefulSetRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StatefulSet::class);
    }

    // /**
    //  * @return StatefulSet[] Returns an array of StatefulSet objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?StatefulSet
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
