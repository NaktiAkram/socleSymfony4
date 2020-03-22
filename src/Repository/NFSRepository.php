<?php

namespace App\Repository;

use App\Entity\NFS;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method NFS|null find($id, $lockMode = null, $lockVersion = null)
 * @method NFS|null findOneBy(array $criteria, array $orderBy = null)
 * @method NFS[]    findAll()
 * @method NFS[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NFSRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NFS::class);
    }

    // /**
    //  * @return NFS[] Returns an array of NFS objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('n.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?NFS
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
