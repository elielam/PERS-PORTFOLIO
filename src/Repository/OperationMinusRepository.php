<?php

namespace App\Repository;

use App\Entity\Account;
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

    public function findSumOperationMinus(Account $account)
    {
         $queryBuilder = $this->createQueryBuilder('a')
            ->where('a.account = :account')->setParameter('account', $account)
            ->orderBy('a.id', 'ASC')
            ->getQuery();

         $totalOpMinus = 0;
         foreach ($queryBuilder->getResult() as $opMinus) {
             $totalOpMinus += $opMinus->getSum();
         }

         return $totalOpMinus;
    }
}
