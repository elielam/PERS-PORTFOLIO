<?php

namespace App\Controller;

use App\Entity\Todo;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DashboardController extends Controller
{
    /**
     * @Route("/dashboard", name="dashboard")
     */
    public function index()
    {
        $entityManager = $this->getDoctrine()->getManager();

        $datas = [];
        $datas['todos'] = [];
        $datas['todos']['entities'] = $entityManager->getRepository(Todo::class)->findAll();
        $datas['todos']['count'] = count($datas['todos']['entities'])-1;

        return $this->render('dashboard/dashboard.html.twig', array(
            'todos' => $datas['todos']
        ));
    }

    // Retrieve Datas */

    /**
     * @Route("/dashboard/refresh/todos", name="ajax_todos")
     * @Method("GET")
     * @return JsonResponse
     */
    public function getTodosAction() {
        $entityManager = $this->getDoctrine()->getManager();
        $datas = [];
        $datas['todos'] = [];
        $datas['todos']['entities'] = $entityManager->getRepository(Todo::class)->findAll();
        $datas['todos']['count'] = count($datas['todos']['entities'])-1;

        return new JsonResponse($datas);
    }

    /* Navbar */

    public function navbarAction () {
        return $this->render('dashboard/dashboard-navbar.html.twig');
    }

    /* Navbtns */

    public function navbtnsAction () {
        return $this->render('dashboard/dashboard-navbtns.html.twig');
    }
}
