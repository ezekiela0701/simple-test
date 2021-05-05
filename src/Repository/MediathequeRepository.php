<?php

namespace App\Repository;

use App\Entity\Mediatheque;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Mediatheque|null find($id, $lockMode = null, $lockVersion = null)
 * @method Mediatheque|null findOneBy(array $criteria, array $orderBy = null)
 * @method Mediatheque[]    findAll()
 * @method Mediatheque[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MediathequeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Mediatheque::class);
    }

    // /**
    //  * @return Mediatheque[] Returns an array of Mediatheque objects
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
    public function findOneBySomeField($value): ?Mediatheque
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
