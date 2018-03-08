<?php

namespace App\DataFixtures;

use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Todo;

class TodoFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $objDateTime = new DateTime('NOW');

        for ($i = 1; $i <= 6; $i++) {
            $todo = new Todo();
            $todo->setLibelle('TODO '.$i);
            $todo->setDesc('This is the '.$i.' todo of the list , for test purpose !');
            $todo->setDatetime($objDateTime);
            $todo->setState(1);
            $todo->setUid(1);
            $manager->persist($todo);
        }

//        $todo = new Todo();
//        $todo->setLibelle('TODO UN');
//        $todo->setDesc('This is the first todo of the list for test purpose !');
//        $todo->setDatetime($objDateTime);
//        $todo->setState(1);
//        $todo->setUid(1);
//        $manager->persist($todo);
//
//        $todo = new Todo();
//        $todo->setLibelle('TODO DEUX');
//        $todo->setDesc('This is the second todo of the list for test purpose !');
//        $todo->setDatetime($objDateTime);
//        $todo->setState(1);
//        $todo->setUid(1);
//        $manager->persist($todo);

        $manager->flush();
    }
}
