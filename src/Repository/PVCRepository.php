<?php

namespace App\Repository;

use App\Entity\PVC;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method PVC|null find($id, $lockMode = null, $lockVersion = null)
 * @method PVC|null findOneBy(array $criteria, array $orderBy = null)
 * @method PVC[]    findAll()
 * @method PVC[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PVCRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PVC::class);
    }

    // /**
    //  * @return PVC[] Returns an array of PVC objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PVC
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
