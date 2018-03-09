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

        for ($i = 1; $i <= 6; $i++) {
            $todo = new Todo();
            $todo->setLibelle('TODO '.$i);
            $todo->setDescription('This is the '.$i.' description sample !');
            $todo->setDatetime(null);
            $todo->setState(1);
            $todo->setUid(1);
            $manager->persist($todo);
        }

        $manager->flush();
    }
}
