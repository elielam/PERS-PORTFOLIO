<?php

namespace App\DataFixtures;

use App\Entity\User;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{

    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setName('Elie');
        $user->setLastName('LALOUM');
        $user->setBirthdate(DateTime::createFromFormat('j/M/Y', date("j/M/Y")));
        $user->setEmail('elielaloum@outlook.fr');
        $user->setPassword($this->encoder->encodePassword($user, 'elie')); // elie
        $user->setSalt(null);
        $user->setRoles('ROLE_ADMIN');
        $user->setUsername('Elie');
        $manager->persist($user);

        $user = new User();
        $user->setName('Admin');
        $user->setLastName('ADMIN');
        $user->setBirthdate(DateTime::createFromFormat('j/M/Y', date("j/M/Y")));
        $user->setEmail('admin@admin.fr');
        $user->setPassword($this->encoder->encodePassword($user, 'admin')); // admin
        $user->setSalt(null);
        $user->setRoles('ROLE_ADMIN');
        $user->setUsername('Admin');
        $manager->persist($user);

        $user = new User();
        $user->setName('Test');
        $user->setLastName('TEST');
        $user->setBirthdate(DateTime::createFromFormat('j/M/Y', date("j/M/Y")));
        $user->setEmail('test@test.fr');
        $user->setPassword($this->encoder->encodePassword($user, 'test')); // test
        $user->setSalt('987654321');
        $user->setRoles('ROLE_USER');
        $user->setUsername('Test');
        $manager->persist($user);

        $manager->flush();
    }
}
