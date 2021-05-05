<?php

namespace App\Repository;

use App\Entity\Circular;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Circular|null find($id, $lockMode = null, $lockVersion = null)
 * @method Circular|null findOneBy(array $criteria, array $orderBy = null)
 * @method Circular[]    findAll()
 * @method Circular[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CircularRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Circular::class);
    }

    // /**
    //  * @return Circular[] Returns an array of Circular objects
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
    public function findOneBySomeField($value): ?Circular
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
