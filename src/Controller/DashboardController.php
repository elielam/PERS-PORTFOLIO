<?php

namespace App\Controller;

use App\Entity\Todo;
use App\Entity\Account;
use App\Entity\OperationMinus;
use App\Entity\OperationPlus;

use App\Entity\User;
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
    //  $this->addFlash('success',
    //    'Suppression a été effectuée avec succès!'
    //  );

        return $this->render('dashboard/dashboard.html.twig');
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

        $tmpTitle = $request->get('newTitle');
        $tmpDescription = $request->get('newDescription');

        $time = date("h:i:s");
        $date = date("j-m-Y");

        $todo = new Todo();
        $todo->setLibelle($tmpTitle);
        $todo->setDescription($tmpDescription);
        $todo->setDatetime(\DateTime::createFromFormat('d-m-Y H:i:s', $date.' '.$time));
        $todo->setState(1);
        $todo->setUser($this->getUser());
        $this->getUser()->addTodo($todo);
        $entityManager->persist($this->getUser());
        $entityManager->flush();

        $datas = [];
        $datas['todos'] = [];
        $todos = $this->getUser()->getTodos();
        foreach ($todos as $todo) {
            $datas['todos'][] = $todo->serialize();
        }

        return new JsonResponse($datas);
    }

//    /**
//     * @Route("/dashboard/delete/todos", name="ajax_delete_todos")
//     * @Method("POST")
//     * @param Request $request
//     * @return JsonResponse
//     */
//    public function deleteTodoAction (Request $request) {
//
//        $entityManager = $this->getDoctrine()->getManager();
//        $todoRepository = $entityManager->getRepository(Todo::class);
//        $encoders = array(new JsonEncoder());
//        $normalizers = array(new ObjectNormalizer());
//        $serializer = new Serializer($normalizers, $encoders);
//
//        $tmpId = $request->get('todoId');
//
//        $todo = $todoRepository->findOneBy(['id' => $tmpId]);
//        $entityManager->remove($todo);
//        $entityManager->flush();
//
//        $datas = [];
//        $datas['todos'] = [];
//        $datas['todos']['tmpentities'] = $todoRepository->findBy(
//            array('user' => $this->getUser()),
//            array('state' => 'DESC'));
//
//        if($datas['todos']['tmpentities']) {
//            foreach ($datas['todos']['tmpentities'] as $entity) {
//                $datas['todos']['entities'][] = $serializer->serialize($entity, 'json');
//            }
//            $datas['todos']['count'] = count($datas['todos']['entities']);
//        } else {
//            $datas['todos']['count'] = 0;
//        }
//
//        unset($datas['todos']['tmpentities']);
//
//        return new JsonResponse($datas);
//    }
//
//    /**
//     * @Route("/dashboard/update/todos", name="ajax_update_todos")
//     * @Method("POST")
//     * @param Request $request
//     * @return JsonResponse
//     */
//    public function updateTodoAction (Request $request) {
//
//        $entityManager = $this->getDoctrine()->getManager();
//        $todoRepository = $entityManager->getRepository(Todo::class);
//        $encoders = array(new JsonEncoder());
//        $normalizers = array(new ObjectNormalizer());
//        $serializer = new Serializer($normalizers, $encoders);
//
//        $tmpId = $request->get('todoId');
//        $tmpLibelle = $request->get('libelle');
//        $tmpDescription = $request->get('description');
//
//        $todo = $todoRepository->find($tmpId);
//        $todo->setLibelle($tmpLibelle);
//        $todo->setDescription($tmpDescription);
//        $entityManager->flush();
//
//        $datas = [];
//        $datas['todos'] = [];
//        $datas['todos']['tmpentities'] = $todoRepository->findBy(
//            array('user' => $this->getUser()),
//            array('state' => 'DESC'));
//
//        if($datas['todos']['tmpentities']) {
//            foreach ($datas['todos']['tmpentities'] as $entity) {
//                $datas['todos']['entities'][] = $serializer->serialize($entity, 'json');
//            }
//            $datas['todos']['count'] = count($datas['todos']['entities']);
//        } else {
//            $datas['todos']['count'] = 0;
//        }
//
//        unset($datas['todos']['tmpentities']);
//
//        return new JsonResponse($datas);
//    }
//
//    /**
//     * @Route("/dashboard/state/todos", name="ajax_state_todos")
//     * @Method("POST")
//     * @param Request $request
//     * @return JsonResponse
//     */
//    public function stateTodoAction (Request $request) {
//
//        $entityManager = $this->getDoctrine()->getManager();
//        $todoRepository = $entityManager->getRepository(Todo::class);
//        $encoders = array(new JsonEncoder());
//        $normalizer = new ObjectNormalizer();
//        $normalizer->setCircularReferenceLimit(5);
//        $normalizer->setCircularReferenceHandler(function ($object) {
//            return $object->getId();
//        });
//        $normalizers = array($normalizer);
//        $serializer = new Serializer($normalizers, $encoders);
//
//        $tmpId = $request->get('todoId');
//        $tmpState = $request->get('todoState');
//
//        $todo = $todoRepository->find($tmpId);
//        $todo->setState($tmpState);
//        $entityManager->flush();
//
//        $datas = [];
//        $datas['todos'] = [];
//        $datas['todos']['tmpentities'] = $todoRepository->findBy(
//            array('user' => $this->getUser()),
//            array('state' => 'DESC'));
//
//        if($datas['todos']['tmpentities']) {
//            foreach ($datas['todos']['tmpentities'] as $entity) {
//                $datas['todos']['entities'][] = $serializer->serialize($entity, 'json');
//            }
//            $datas['todos']['count'] = count($datas['todos']['entities']);
//        } else {
//            $datas['todos']['count'] = 0;
//        }
//
//        unset($datas['todos']['tmpentities']);
//
//        return new JsonResponse($datas);
//    }

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
            'todos' => $datas['todos']
        ));
    }

    /* Financial Component */

    public function financialComponentAction()
    {
        $datas = [];
        $datas['accounts'] = [];
        $accounts = $this->getUser()->getAccounts();
        foreach ( $accounts as $account){
            $datas['accounts'][] = $account;
        }

        return $this->render('dashboard/dashboard-financial-component.html.twig', array(
            'accounts' => $datas['accounts']
        ));
    }

}
