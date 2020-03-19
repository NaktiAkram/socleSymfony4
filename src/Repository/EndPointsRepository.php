<?php

namespace App\Repository;

use App\Entity\EndPoints;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method EndPoints|null find($id, $lockMode = null, $lockVersion = null)
 * @method EndPoints|null findOneBy(array $criteria, array $orderBy = null)
 * @method EndPoints[]    findAll()
 * @method EndPoints[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EndPointsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EndPoints::class);
    }

    // /**
    //  * @return EndPoints[] Returns an array of EndPoints objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?EndPoints
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
