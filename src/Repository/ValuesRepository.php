<?php

namespace App\Repository;

use App\Entity\Values;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Values|null find($id, $lockMode = null, $lockVersion = null)
 * @method Values|null findOneBy(array $criteria, array $orderBy = null)
 * @method Values[]    findAll()
 * @method Values[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ValuesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Values::class);
    }

    // /**
    //  * @return Values[] Returns an array of Values objects
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
    public function findOneBySomeField($value): ?Values
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
