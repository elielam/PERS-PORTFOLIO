<?php

namespace App\Repository;

use App\Entity\PaymentCategory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method PaymentCategory|null find($id, $lockMode = null, $lockVersion = null)
 * @method PaymentCategory|null findOneBy(array $criteria, array $orderBy = null)
 * @method PaymentCategory[]    findAll()
 * @method PaymentCategory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PaymentCategoryRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, PaymentCategory::class);
    }

    public function findAllPaymentCategoriesName()
    {
        $queryBuilder = $this->createQueryBuilder('p')
            ->orderBy('p.id', 'ASC')
            ->getQuery();

        $res = $queryBuilder->getResult();
        $categoriesName = null;
        foreach ($res as $category) {
            $categoriesName[] = (string)$category->getLibelle();
        }

        return $categoriesName;
    }

}
