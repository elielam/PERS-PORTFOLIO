<?php

namespace App\DataFixtures;

use App\Entity\OperationPlus;
use App\Entity\PaymentCategory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class PaymentCategoryFixtures extends Fixture
{
    public const LOISIRS_USER_REF = 'loisirs-category';
    public const VETEMENTS_USER_REF = 'vetements-category';
    public const CHARGES_USER_REF = 'charges-category';
    public const ABONEMENTS_USER_REF = 'abonements-category';
    public const ALIMENTAIRES_USER_REF = 'alimentaires-category';

    public function load(ObjectManager $manager)
    {

        $paymentCategory = new PaymentCategory();
        $paymentCategory->setLibelle('Loisirs');
        $manager->persist($paymentCategory);
        $this->addReference(self::LOISIRS_USER_REF, $paymentCategory);
        $paymentCategory = new PaymentCategory();
        $paymentCategory->setLibelle('Vêtement');
        $manager->persist($paymentCategory);
        $this->addReference(self::VETEMENTS_USER_REF, $paymentCategory);
        $paymentCategory = new PaymentCategory();
        $paymentCategory->setLibelle('Charges');
        $manager->persist($paymentCategory);
        $this->addReference(self::CHARGES_USER_REF, $paymentCategory);
        $paymentCategory = new PaymentCategory();
        $paymentCategory->setLibelle('Abonnement');
        $manager->persist($paymentCategory);
        $this->addReference(self::ABONEMENTS_USER_REF, $paymentCategory);
        $paymentCategory = new PaymentCategory();
        $paymentCategory->setLibelle('Alimentaire');
        $manager->persist($paymentCategory);
        $this->addReference(self::ALIMENTAIRES_USER_REF, $paymentCategory);
        $manager->flush();
    }

}
