<?php

namespace App\Repository;

use App\Entity\Frais;
use App\Entity\Client;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @method Frais|null find($id, $lockMode = null, $lockVersion = null)
 * @method Frais|null findOneBy(array $criteria, array $orderBy = null)
 * @method Frais[]    findAll()
 * @method Frais[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FraisRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Frais::class);
    }

    // /**
    //  * @return Frais[] Returns an array of Frais objects
    //  */
    
    //  public function totalFraisClient($total)
    //  {
    //     return $this->createQueryBuilder('f')
    //         ->select(SUM ('f.trajet', 'f.nuit','f.repas'))
    //         ->andWhere('f.id = c.id')
    //         ->getQuery()
    //         ->getOneOrNullResult();       
    //  }
    

    /*
    public function findOneBySomeField($value): ?Frais
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
