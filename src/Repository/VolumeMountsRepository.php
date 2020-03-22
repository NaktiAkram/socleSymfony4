<?php

namespace App\Repository;

use App\Entity\VolumeMounts;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method VolumeMounts|null find($id, $lockMode = null, $lockVersion = null)
 * @method VolumeMounts|null findOneBy(array $criteria, array $orderBy = null)
 * @method VolumeMounts[]    findAll()
 * @method VolumeMounts[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VolumeMountsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, VolumeMounts::class);
    }

    // /**
    //  * @return VolumeMounts[] Returns an array of VolumeMounts objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?VolumeMounts
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
