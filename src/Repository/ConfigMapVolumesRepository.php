<?php

namespace App\Repository;

use App\Entity\ConfigMapVolumes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ConfigMapVolumes|null find($id, $lockMode = null, $lockVersion = null)
 * @method ConfigMapVolumes|null findOneBy(array $criteria, array $orderBy = null)
 * @method ConfigMapVolumes[]    findAll()
 * @method ConfigMapVolumes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ConfigMapVolumesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ConfigMapVolumes::class);
    }

    // /**
    //  * @return ConfigMapVolumes[] Returns an array of ConfigMapVolumes objects
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
    public function findOneBySomeField($value): ?ConfigMapVolumes
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
