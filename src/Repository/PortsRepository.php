<?php

namespace App\Repository;

use App\Entity\Ports;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Ports|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ports|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ports[]    findAll()
 * @method Ports[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PortsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Ports::class);
    }

    // /**
    //  * @return Ports[] Returns an array of Ports objects
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
    public function findOneBySomeField($value): ?Ports
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
