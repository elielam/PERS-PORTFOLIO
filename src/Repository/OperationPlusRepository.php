<?php

namespace App\Repository;

use App\Entity\Account;
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

    public function findSumOperationPlus(Account $account)
    {
        $queryBuilder = $this->createQueryBuilder('a')
            ->where('a.account = :account')->setParameter('account', $account)
            ->orderBy('a.id', 'ASC')
            ->getQuery();

        $totalOpPlus = 0;
        foreach ($queryBuilder->getResult() as $opPlus) {
            $totalOpPlus += $opPlus->getSum();
        }

        return $totalOpPlus;
    }
}
