<?php

namespace App\DataFixtures;

use App\Entity\Account;
use App\Entity\MeanOfPayment;
use App\Entity\OperationMinus;
use App\Entity\OperationPlus;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Validator\Constraints\Collection;

class AccountFixtures extends Fixture implements DependentFixtureInterface
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
            $account->setBic("0000000000".$j);
            $account->setIban("000000000000000000000000000000000".$j);
            $account->setBalance($balance);
            $account->setAtFirstBalance($balance);
            $account->setInterestDraft($interestedDraft);
            $account->setOverdraft($overdraft);
            if ($j == 1 || $j == 2) {
                $account->setUser($this->getReference(UserFixtures::ADMIN_USER_REF));
            } elseif ($j == 3 || $j == 4) {
                $account->setUser($this->getReference(UserFixtures::TEST_USER_REF));
            } else {
                $account->setUser($this->getReference(UserFixtures::ELIE_USER_REF));
                $mOp = new MeanOfPayment();
                $mOp->setLibelle('Visa 1');
                $mOp->setcardType(1);
                $mOp->setWithdrawalBalance(3000);
                $mOp->setPaymentBalance(5500);
                $mOp->setAccount($account);
                $manager->persist($mOp);
                $mOp = new MeanOfPayment();
                $mOp->setLibelle('Mastercard 2');
                $mOp->setcardType(2);
                $mOp->setWithdrawalBalance(500);
                $mOp->setPaymentBalance(1200);
                $mOp->setAccount($account);
                $manager->persist($mOp);
            }


            for ($i = 1; $i < 11; $i++) {
                $plusSum = rand(0, 100);

                $operationPlus = new OperationPlus();
                $operationPlus->setLibelle('Account N°'.$j.' Operation N°'.$i);
                $operationPlus->setDatetime(DateTime::createFromFormat('d-m-Y H:i:s', $date.' '.$time));
                $operationPlus->setSum($plusSum);
                $operationPlus->setIsCredit(false);
                $operationPlus->setAccount($account);
                if($i === 1 OR $i === 2) {
                    $operationPlus->setCategory($this->getReference(PaymentCategoryFixtures::LOISIRS_USER_REF));
                } elseif ($i === 3 OR $i === 4) {
                    $operationPlus->setCategory($this->getReference(PaymentCategoryFixtures::VETEMENTS_USER_REF));
                } elseif ($i === 5 OR $i === 6 ) {
                    $operationPlus->setCategory($this->getReference(PaymentCategoryFixtures::CHARGES_USER_REF));
                } elseif ($i === 7 OR $i === 8 ) {
                    $operationPlus->setCategory($this->getReference(PaymentCategoryFixtures::ABONEMENTS_USER_REF));
                } elseif ($i === 9 OR $i === 10 ) {
                    $operationPlus->setCategory($this->getReference(PaymentCategoryFixtures::ALIMENTAIRES_USER_REF));
                }
                $manager->persist($operationPlus);
            }

            for ($i = 1; $i < 11; $i++) {
                $minusSum = rand(0, 100);

                $operationMinus = new OperationMinus();
                $operationMinus->setLibelle('Account N°'.$j.' Operation N°'.$i);
                $operationMinus->setDatetime(DateTime::createFromFormat('d-m-Y H:i:s', $date.' '.$time));
                $operationMinus->setSum($minusSum);
                $operationMinus->setIsDebit(false);
                $operationMinus->setAccount($account);
                if($i === 1 OR $i === 2) {
                    $operationMinus->setCategory($this->getReference(PaymentCategoryFixtures::LOISIRS_USER_REF));
                } elseif ($i === 3 OR $i === 4) {
                    $operationMinus->setCategory($this->getReference(PaymentCategoryFixtures::VETEMENTS_USER_REF));
                } elseif ($i === 5 OR $i === 6 ) {
                    $operationMinus->setCategory($this->getReference(PaymentCategoryFixtures::CHARGES_USER_REF));
                } elseif ($i === 7 OR $i === 8 ) {
                    $operationMinus->setCategory($this->getReference(PaymentCategoryFixtures::ABONEMENTS_USER_REF));
                } elseif ($i === 9 OR $i === 10 ) {
                    $operationMinus->setCategory($this->getReference(PaymentCategoryFixtures::ALIMENTAIRES_USER_REF));
                }
                $manager->persist($operationMinus);
            }

            $manager->persist($account);
        }

        $manager->flush();
    }

    /**
     * This method must return an array of fixtures classes
     * on which the implementing class depends on
     *
     * @return array
     */
    function getDependencies()
    {
        return array(
          UserFixtures::class,
          PaymentCategoryFixtures::class
        );
    }
}
