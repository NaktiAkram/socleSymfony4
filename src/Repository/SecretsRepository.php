<?php

namespace App\Repository;

use App\Entity\Secrets;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Secrets|null find($id, $lockMode = null, $lockVersion = null)
 * @method Secrets|null findOneBy(array $criteria, array $orderBy = null)
 * @method Secrets[]    findAll()
 * @method Secrets[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SecretsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Secrets::class);
    }

    // /**
    //  * @return Secrets[] Returns an array of Secrets objects
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
    public function findOneBySomeField($value): ?Secrets
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
