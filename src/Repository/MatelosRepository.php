<?php

namespace App\Repository;

use App\Entity\Matelos;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Matelos|null find($id, $lockMode = null, $lockVersion = null)
 * @method Matelos|null findOneBy(array $criteria, array $orderBy = null)
 * @method Matelos[]    findAll()
 * @method Matelos[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MatelosRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Matelos::class);
    }

    // /**
    //  * @return Matelos[] Returns an array of Matelos objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Matelos
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
