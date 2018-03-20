<?php

namespace App\Controller;

use App\Entity\Todo;
use App\Entity\Account;
use App\Entity\OperationMinus;
use App\Entity\OperationPlus;

use App\Entity\User;
use App\Form\AccountType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

class DashboardController extends Controller
{
    /**
     * @Route("/dashboard", name="dashboard")
     */
    public function index()
    {
        return $this->render('dashboard/dashboard.html.twig');
    }

    /* Navbar */

    public function navbarAction () {
        return $this->render('dashboard/dashboard-navbar.html.twig');
    }

    /* Navbtns */

    public function navbtnsAction () {
        return $this->render('dashboard/dashboard-navbtns.html.twig');
    }

    /* Todo Component */

    public function todosComponentAction()
    {
        $entityManager = $this->getDoctrine()->getManager();

        $datas = [];
        $datas['todos'] = [];
        $todos = $this->getUser()->getTodos();
        foreach ( $todos as $todo){
            $datas['todos'][] = $todo;
        }

        return $this->render('dashboard/dashboard-todos-component.html.twig', array(
            'datas' => $datas
        ));
    }

    /* Financial Component */

    public function financialComponentAction()
    {
        $entityManager = $this->getDoctrine()->getManager();

        $datas = [];
        $datas['accounts'] = [];
        $accounts = $this->getUser()->getAccounts();

        unset($accounts);
        $accounts = $this->getUser()->getAccounts();
        foreach ( $accounts as $account){
            $datas['accounts'][] = $account;
        }

        return $this->render('dashboard/dashboard-financial-component.html.twig', array(
            'datas' => $datas
        ));
    }
}
