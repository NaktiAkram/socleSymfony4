<?php

namespace App\Repository;

use App\Entity\ConfigMap;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ConfigMap|null find($id, $lockMode = null, $lockVersion = null)
 * @method ConfigMap|null findOneBy(array $criteria, array $orderBy = null)
 * @method ConfigMap[]    findAll()
 * @method ConfigMap[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ConfigMapRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ConfigMap::class);
    }

    // /**
    //  * @return ConfigMap[] Returns an array of ConfigMap objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ConfigMap
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
