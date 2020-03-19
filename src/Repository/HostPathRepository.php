<?php

namespace App\Repository;

use App\Entity\HostPath;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method HostPath|null find($id, $lockMode = null, $lockVersion = null)
 * @method HostPath|null findOneBy(array $criteria, array $orderBy = null)
 * @method HostPath[]    findAll()
 * @method HostPath[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HostPathRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HostPath::class);
    }

    // /**
    //  * @return HostPath[] Returns an array of HostPath objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('h.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?HostPath
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
