<?php

namespace App\Repository;

use App\Entity\GlusterFS;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method GlusterFS|null find($id, $lockMode = null, $lockVersion = null)
 * @method GlusterFS|null findOneBy(array $criteria, array $orderBy = null)
 * @method GlusterFS[]    findAll()
 * @method GlusterFS[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GlusterFSRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GlusterFS::class);
    }

    // /**
    //  * @return GlusterFS[] Returns an array of GlusterFS objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?GlusterFS
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
