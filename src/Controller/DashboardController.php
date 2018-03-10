<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

use App\Entity\Todo;

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
    //  $this->addFlash('success',
    //    'Suppression a été effectuée avec succès!'
    //  );

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
     * @Route("/dashboard/add/todos", name="ajax_add_todos")
     * @Method("POST")
     * @param Request $request
     * @return JsonResponse
     */
    public function addTodoAction(Request $request) {

        $entityManager = $this->getDoctrine()->getManager();
        $todoRepository = $entityManager->getRepository(Todo::class);
        $encoders = array(new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());
        $serializer = new Serializer($normalizers, $encoders);

        $tmpTitle = $request->get('newTitle');
        $tmpDescription = $request->get('newDescription');

        $todo = new Todo();
        $todo->setLibelle($tmpTitle);
        $todo->setDescription($tmpDescription);
        $todo->setDatetime(null);
        $todo->setState(1);
        $todo->setUid(1);
        $entityManager->persist($todo);
        $entityManager->flush();

        $datas = [];
        $datas['todos'] = [];
        $datas['todos']['tmpentities'] = $todoRepository->findAll();

        foreach ($datas['todos']['tmpentities'] as $entity) {
            $datas['todos']['entities'][] = $serializer->serialize($entity, 'json');
        }

        $datas['todos']['count'] = count($datas['todos']['entities']);

        unset($datas['todos']['tmpentities']);


        return new JsonResponse($datas);
    }

    /**
     * @Route("/dashboard/delete/todos", name="ajax_delete_todos")
     * @Method("POST")
     * @param Request $request
     * @return JsonResponse
     */
    public function deleteTodoAction (Request $request) {

        $entityManager = $this->getDoctrine()->getManager();
        $todoRepository = $entityManager->getRepository(Todo::class);
        $encoders = array(new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());
        $serializer = new Serializer($normalizers, $encoders);

        $tmpId = $request->get('todoId');

        $todo = $todoRepository->findOneBy(['id' => $tmpId]);
        $entityManager->remove($todo);
        $entityManager->flush();

        $datas = [];
        $datas['todos'] = [];
        $datas['todos']['tmpentities'] = $todoRepository->findAll();

        foreach ($datas['todos']['tmpentities'] as $entity) {
            $datas['todos']['entities'][] = $serializer->serialize($entity, 'json');
        }

        $datas['todos']['count'] = count($datas['todos']['entities']);

        unset($datas['todos']['tmpentities']);

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
