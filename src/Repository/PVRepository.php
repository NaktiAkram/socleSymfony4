<?php

namespace App\Repository;

use App\Entity\PV;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method PV|null find($id, $lockMode = null, $lockVersion = null)
 * @method PV|null findOneBy(array $criteria, array $orderBy = null)
 * @method PV[]    findAll()
 * @method PV[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PVRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PV::class);
    }

    // /**
    //  * @return PV[] Returns an array of PV objects
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
    public function findOneBySomeField($value): ?PV
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
