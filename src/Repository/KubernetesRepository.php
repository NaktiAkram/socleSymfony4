<?php

namespace App\Repository;

use App\Entity\Kubernetes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Kubernetes|null find($id, $lockMode = null, $lockVersion = null)
 * @method Kubernetes|null findOneBy(array $criteria, array $orderBy = null)
 * @method Kubernetes[]    findAll()
 * @method Kubernetes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class KubernetesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Kubernetes::class);
    }

    // /**
    //  * @return Kubernetes[] Returns an array of Kubernetes objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('k')
            ->andWhere('k.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('k.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Kubernetes
    {
        return $this->createQueryBuilder('k')
            ->andWhere('k.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
