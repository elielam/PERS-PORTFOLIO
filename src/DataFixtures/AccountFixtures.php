<?php

namespace App\DataFixtures;

use App\Entity\Account;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AccountFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        for ($i = 0; $i <= 5; $i++) {
            $balance = rand(500, 10000);
            $interestedDraft = rand(0, 2);
            $overdraft = rand(0, -500);

            $account = new Account();
            $account->setLibelle('Account N°'.$i);
            $account->setType(1); // 1 : Visa | 2 : Mastercard | 0 : Autres
            $account->setBalance($balance);
            $account->setInterestDraft($interestedDraft);
            $account->setOverdraft($overdraft);
            $account->setUid(1);
            $manager->persist($account);
        }

        $manager->flush();
    }
}
