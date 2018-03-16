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
     * @Route("/test/testAction", name="testAction")
     */
    public function testAction()
    {
        //  $this->addFlash('success',
        //    'Suppression a été effectuée avec succès!'
        //  );

//        date_default_timezone_set('Europe/Paris');
//        $time = date("h:i:s");
//        $date = date("j-m-Y");
//        $date1= date_create("18-01-1996");
//
//
//        dump($time, $date, $date1);die;

        $user = $this->getUser();
        $account = $user->getAccount(5);
        dump($account);
        $account->initBalance();
        dump($account);die;
    }
}