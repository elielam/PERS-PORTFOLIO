<?php
/**
 * Created by PhpStorm.
 * User: Elie
 * Date: 16/12/2017
 * Time: 17:45
 */

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\Common\Persistence\ObjectManager;

use App\Entity\User;
use App\Entity\Todo;


class TestController extends Controller
{
    /**
     * @Route("/fixture/injectUsers", name="injectUsers")
     */
    public function injectUsersAction(ObjectManager $manager)
    {

        $name = 'Elie';
        $lastname = 'LALOUM';
        $birthdate = '18/01/1996';
        $email = 'elielaloum@outlook.fr';
        $password = '$2y$10$YSPofK4b4dDpQyKIvhCSleAmiQZCfvoVhHxRFsntndwt7j4Cpjn/m';
        $salt = '987654321';
        $roles = "ROLE_ADMIN";
        $username = "Elie";

        $user = new User();
        $user->setName($name);
        $user->setLastName($lastname);
        $user->setBirthdate($birthdate);
        $user->setEmail($email);
        $user->setPassword($password); // elie
        $user->setSalt($salt);
        $user->setRoles($roles);
        $user->setUsername($username);
        $manager->persist($user);

        $user = new User();
        $user->setName('Test');
        $user->setLastName('TEST');
        $user->setBirthdate('00/00/0000');
        $user->setEmail('test@test.fr');
        $user->setPassword('$2y$10$YxP/PKhGe6ckwVrY5I1RUu9Oif2vBAWNJ7IY2jI8BXdqhoyIx5u1e'); // test
        $user->setSalt('987654321');
        $user->setRoles('ROLE_USER');
        $user->setUsername('Test');
        $manager->persist($user);

        $manager->flush();

        return $this->redirectToRoute('dashboard');
    }

    /**
     * @Route("/fixture/injectTodos", name="injectTodos")
     */
    public function injectTodosAction(ObjectManager $manager)
    {
        $todo = new Todo();
        $todo->setLibelle('TODO 1');
        $todo->setDesc('This is the first todo of the list , for test purpose !');
        $todo->setDatetime(date('d/m/y'));
        $todo->setState(1);
        $todo->setUid(1);
        $manager->persist($todo);

        $todo = new Todo();
        $todo->setLibelle('TODO 2');
        $todo->setDesc('This is the second todo of the list , for test purpose !');
        $todo->setDatetime(date('d/m/y'));
        $todo->setState(1);
        $todo->setUid(1);
        $manager->persist($todo);

        $manager->flush();

        return $this->redirectToRoute('dashboard');
    }
}