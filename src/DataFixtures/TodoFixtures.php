<?php

namespace App\DataFixtures;

use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Todo;

class TodoFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $time = date("h:i:s");
        $date = date("j-m-Y");

        for ($j = 1 ; $j < 4; $j++) {
            for ($i = 1; $i < 6; $i++) {
                $todo = new Todo();
                $todo->setLibelle('TODO ' . $i);
                $todo->setDescription('This is the ' . $i . ' description sample !');
                $todo->setDatetime(DateTime::createFromFormat('d-m-Y H:i:s', $date . ' ' . $time));
                $todo->setState(1);
                if ($j == 1) {
                    $todo->setUser($this->getReference(UserFixtures::ELIE_USER_REF));
                } elseif ($j == 2) {
                    $todo->setUser($this->getReference(UserFixtures::ADMIN_USER_REF));
                } else {
                    $todo->setUser($this->getReference(UserFixtures::TEST_USER_REF));
                }
                $manager->persist($todo);
            }
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
            AccountFixtures::class
        );
    }
}
