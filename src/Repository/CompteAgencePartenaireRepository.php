<?php

namespace App\Repository;

use App\Entity\CompteAgencePartenaire;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CompteAgencePartenaire|null find($id, $lockMode = null, $lockVersion = null)
 * @method CompteAgencePartenaire|null findOneBy(array $criteria, array $orderBy = null)
 * @method CompteAgencePartenaire[]    findAll()
 * @method CompteAgencePartenaire[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CompteAgencePartenaireRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CompteAgencePartenaire::class);
    }

    // /**
    //  * @return CompteAgencePartenaire[] Returns an array of CompteAgencePartenaire objects
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
    public function findOneBySomeField($value): ?CompteAgencePartenaire
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
