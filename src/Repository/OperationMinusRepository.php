<?php

namespace App\Repository;

use App\Entity\OperationMinus;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method OperationMinus|null find($id, $lockMode = null, $lockVersion = null)
 * @method OperationMinus|null findOneBy(array $criteria, array $orderBy = null)
 * @method OperationMinus[]    findAll()
 * @method OperationMinus[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OperationMinusRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, OperationMinus::class);
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
