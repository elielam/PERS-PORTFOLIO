<?php

namespace App\Controller;

use App\Entity\Todo;
use App\Entity\Account;
use App\Entity\OperationMinus;
use App\Entity\OperationPlus;

use App\Entity\User;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Serializer;
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

//        $entityManager = $this->getDoctrine()->getManager();
//        $tmp =  $entityManager->getRepository(User::class)->find(4);
//        $datas['test'] = $tmp->getAccounts();
//
//        dump($datas['test']);die;

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
        $todoRepository = $entityManager->getRepository(Todo::class);
        $encoders = array(new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());
        $serializer = new Serializer($normalizers, $encoders);

        $tmpTitle = $request->get('newTitle');
        $tmpDescription = $request->get('newDescription');

        $time = date("h:i:s");
        $date = date("j-m-Y");

        $todo = new Todo();
        $todo->setLibelle($tmpTitle);
        $todo->setDescription($tmpDescription);
        $todo->setDatetime(\DateTime::createFromFormat('d-m-Y H:i:s', $date.' '.$time));
        $todo->setState(1);
        $todo->setUid($this->getUser()->getUid());
        $entityManager->persist($todo);
        $entityManager->flush();

        $datas = [];
        $datas['todos'] = [];
        $datas['todos']['tmpentities'] = $todoRepository->findBy(
            array('uid' => $this->getUser()->getUid()),
            array('state' => 'DESC'));

        if($datas['todos']['tmpentities']) {
            foreach ($datas['todos']['tmpentities'] as $entity) {
                $datas['todos']['entities'][] = $serializer->serialize($entity, 'json');
            }
            $datas['todos']['count'] = count($datas['todos']['entities']);
        } else {
            $datas['todos']['count'] = 0;
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
        $datas['todos']['tmpentities'] = $todoRepository->findBy(
            array('uid' => $this->getUser()->getUid()),
            array('state' => 'DESC'));

        if($datas['todos']['tmpentities']) {
            foreach ($datas['todos']['tmpentities'] as $entity) {
                $datas['todos']['entities'][] = $serializer->serialize($entity, 'json');
            }
            $datas['todos']['count'] = count($datas['todos']['entities']);
        } else {
            $datas['todos']['count'] = 0;
        }

        unset($datas['todos']['tmpentities']);

        return new JsonResponse($datas);
    }

    /**
     * @Route("/dashboard/update/todos", name="ajax_update_todos")
     * @Method("POST")
     * @param Request $request
     * @return JsonResponse
     */
    public function updateTodoAction (Request $request) {

        $entityManager = $this->getDoctrine()->getManager();
        $todoRepository = $entityManager->getRepository(Todo::class);
        $encoders = array(new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());
        $serializer = new Serializer($normalizers, $encoders);

        $tmpId = $request->get('todoId');
        $tmpLibelle = $request->get('libelle');
        $tmpDescription = $request->get('description');

        $todo = $todoRepository->find($tmpId);
        $todo->setLibelle($tmpLibelle);
        $todo->setDescription($tmpDescription);
        $entityManager->flush();

        $datas = [];
        $datas['todos'] = [];
        $datas['todos']['tmpentities'] = $todoRepository->findBy(
            array('uid' => $this->getUser()->getUid()),
            array('state' => 'DESC'));

        if($datas['todos']['tmpentities']) {
            foreach ($datas['todos']['tmpentities'] as $entity) {
                $datas['todos']['entities'][] = $serializer->serialize($entity, 'json');
            }
            $datas['todos']['count'] = count($datas['todos']['entities']);
        } else {
            $datas['todos']['count'] = 0;
        }

        unset($datas['todos']['tmpentities']);

        return new JsonResponse($datas);
    }

    /**
     * @Route("/dashboard/state/todos", name="ajax_state_todos")
     * @Method("POST")
     * @param Request $request
     * @return JsonResponse
     */
    public function stateTodoAction (Request $request) {

        $entityManager = $this->getDoctrine()->getManager();
        $todoRepository = $entityManager->getRepository(Todo::class);
        $encoders = array(new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());
        $serializer = new Serializer($normalizers, $encoders);

        $tmpId = $request->get('todoId');
        $tmpState = $request->get('todoState');

        $todo = $todoRepository->find($tmpId);
        $todo->setState($tmpState);
        $entityManager->flush();

        $datas = [];
        $datas['todos'] = [];
        $datas['todos']['tmpentities'] = $todoRepository->findBy(
            array('uid' => $this->getUser()->getUid()),
            array('state' => 'DESC'));

        if($datas['todos']['tmpentities']) {
            foreach ($datas['todos']['tmpentities'] as $entity) {
                $datas['todos']['entities'][] = $serializer->serialize($entity, 'json');
            }
            $datas['todos']['count'] = count($datas['todos']['entities']);
        } else {
            $datas['todos']['count'] = 0;
        }

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

    /* Todo Component */

    public function todosComponentAction()
    {
        $entityManager = $this->getDoctrine()->getManager();

        $datas = [];
        $datas['todos'] = [];
        $datas['todos']['entities'] = $entityManager->getRepository(Todo::class)->findBy(
            array('uid' => $this->getUser()->getUid()),
            array('state' => 'DESC'));

        if($datas['todos']['entities']) {
            $datas['todos']['count'] = count($datas['todos']['entities'])-1;
        } else {
            $datas['todos']['count'] = 0;
        }

        return $this->render('dashboard/dashboard-todos-component.html.twig', array(
            'todos' => $datas['todos']
        ));
    }

    /* Financial Component */

    public function financialComponentAction()
    {
        $entityManager = $this->getDoctrine()->getManager();

        $datas = [];
        $datas['accounts'] = [];
        $datas['accounts']['entities']['operationPlus'] = [];
        $datas['accounts']['entities']['operationMinus'] = [];
        $datas['accounts']['entities'] = $entityManager->getRepository(Account::class)->findBy(['uid' => $this->getUser()]);
        
        foreach ($datas['accounts']['entities'] as $account) {
            $datas['accounts']['entities']['operationPlus'][] = $entityManager->getRepository(OperationPlus::class)->findBy(
                array('account' => $account->getAid()),
                array('datetime' => 'DESC'));
            $datas['accounts']['entities']['operationMinus'][] = $entityManager->getRepository(OperationMinus::class)->findBy(
                array('account' => $account->getAid()),
                array('datetime' => 'DESC'));
        }

        if($datas['accounts']['entities']) {
            $datas['accounts']['count'] = count($datas['accounts']['entities'])-1;
        } else {
            $datas['accounts']['count'] = 0;
        }

        return $this->render('dashboard/dashboard-financial-component.html.twig', array(
            'accounts' => $datas['accounts']
        ));
    }


}
