<?php

namespace App\DataFixtures;

use App\Entity\OperationMinus;
use App\Entity\OperationPlus;
use App\Entity\Operation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class OperationFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        for ($i = 0; $i <= 5; $i++) {
            $plusSum = rand(0, 1000);

            $operationPlus = new OperationPlus();
            $operationPlus->setAid(rand(1, 4));
            $operationPlus->setLibelle('Operation N°'.$i);
            $operationPlus->setPlusSum($plusSum);

            $operation = new Operation();
            $operation->setAid($operationPlus->getAid());
            $manager->persist($operationPlus);
        }

        for ($i = 0; $i <= 5; $i++) {
            $minusSum = rand(0, 1000);

            $operationMinus = new OperationMinus();
            $operationMinus->setAid(rand(1, 4));
            $operationMinus->setLibelle('Operation N°'.$i);
            $operationMinus->setMinusSum($minusSum);
            $manager->persist($operationMinus);
        }

        $manager->flush();
    }
}
