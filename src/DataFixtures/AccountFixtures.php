<?php

namespace App\DataFixtures;

use App\Entity\Account;
use App\Entity\OperationMinus;
use App\Entity\OperationPlus;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Validator\Constraints\Collection;

class AccountFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $time = date("h:i:s");
        $date = date("j-m-Y");

        for ($j = 1; $j < 6; $j++) {
            $balance = rand(500, 10000);
            $interestedDraft = rand (1*10, 3*10) / 10;
            $overdraft = rand(0, -500);

            $account = new Account();
            $account->setLibelle('Account N°'.$j);
            $account->setAid($j);
            $account->setType(1); // 1 : Visa | 2 : Mastercard | 0 : Autres
            $account->setBalance($balance);
            $account->setInterestDraft($interestedDraft);
            $account->setUid(1);
            $account->setOverdraft($overdraft);

            for ($i = 1; $i < 11; $i++) {
                $plusSum = rand(0, 1000);

                $operationPlus = new OperationPlus();
                $operationPlus->setLibelle('Account N°'.$j.' Operation N°'.$i);
                $operationPlus->setDatetime(DateTime::createFromFormat('d-m-Y H:i:s', $date.' '.$time));
                $operationPlus->setSum($plusSum);
                $operationPlus->setAid($account);
                $manager->persist($operationPlus);
            }

            for ($i = 1; $i < 11; $i++) {
                $minusSum = rand(0, 1000);

                $operationMinus = new OperationMinus();
                $operationMinus->setLibelle('Account N°'.$j.' Operation N°'.$i);
                $operationMinus->setDatetime(DateTime::createFromFormat('d-m-Y H:i:s', $date.' '.$time));
                $operationMinus->setSum($minusSum);
                $operationMinus->setAid($account);
                $manager->persist($operationMinus);
            }

            $manager->persist($account);
        }

        $manager->flush();
    }
}
