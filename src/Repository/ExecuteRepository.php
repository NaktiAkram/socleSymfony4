<?php

namespace App\Repository;

use App\Entity\Execute;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Execute|null find($id, $lockMode = null, $lockVersion = null)
 * @method Execute|null findOneBy(array $criteria, array $orderBy = null)
 * @method Execute[]    findAll()
 * @method Execute[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExecuteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Execute::class);
    }

    // /**
    //  * @return Execute[] Returns an array of Execute objects
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
    public function findOneBySomeField($value): ?Execute
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
