<?php

namespace App\Repository;

use App\Entity\OperationPlus;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method OperationPlus|null find($id, $lockMode = null, $lockVersion = null)
 * @method OperationPlus|null findOneBy(array $criteria, array $orderBy = null)
 * @method OperationPlus[]    findAll()
 * @method OperationPlus[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OperationPlusRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, OperationPlus::class);
    }

    /*
    public function findBySomething($value)
    {
        return $this->createQueryBuilder('o')
            ->where('o.something = :value')->setParameter('value', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */
}
