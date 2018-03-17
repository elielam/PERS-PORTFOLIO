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

    /**
     * @Route("/dashboard/add/todos", name="ajax_add_todos")
     * @Method("POST")
     * @param Request $request
     * @return JsonResponse
     */
    public function addTodoAction(Request $request) {

        $entityManager = $this->getDoctrine()->getManager();

        $datas = [];
        $datas['todos'] = [];

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

        $todos = $this->getUser()->getTodos();
        foreach ($todos as $todo) {
            $datas['todos'][] = json_encode($todo->serialize());
        }

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

        $tmpId = $request->get('todoId');
        $id = intval($tmpId);

        $datas = [];
        $datas['todos'] = [];

        $todo = $this->getUser()->getTodo($id);
        $this->getUser()->removeTodo($todo);
        $entityManager->persist($this->getUser());
        $entityManager->flush();

        $todos = $this->getUser()->getTodos();
        foreach ($todos as $todo) {
            $datas['todos'][] = json_encode($todo->serialize());
        }

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

        $tmpId = $request->get('todoId');
        $id = intval($tmpId);
        $libelle = $request->get('libelle');
        $description = $request->get('description');

        $datas = [];
        $datas['todos'] = [];

        $todo = $this->getUser()->getTodo($id);
        $todo->setLibelle($libelle);
        $todo->setDescription($description);
        $entityManager->persist($this->getUser());
        $entityManager->flush();

        $todos = $this->getUser()->getTodos();
        foreach ($todos as $todo) {
            $datas['todos'][] = json_encode($todo->serialize());
        }

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

        $tmpId = $request->get('todoId');
        $id = intval($tmpId);
        $state = $request->get('todoState');

        $datas = [];
        $datas['todos'] = [];

        $todo = $this->getUser()->getTodo($id);
        $todo->setState($state);
        $entityManager->persist($this->getUser());
        $entityManager->flush();

        $todos = $this->getUser()->getTodos();
        foreach ($todos as $todo) {
            $datas['todos'][] = json_encode($todo->serialize());
        }

        return new JsonResponse($datas);
    }

    /* Financial Component */

    public function financialComponentAction()
    {
        $entityManager = $this->getDoctrine()->getManager();

        $datas = [];
        $datas['accounts'] = [];
        $accounts = $this->getUser()->getAccounts();
        foreach ( $accounts as $account){
            $account->initBalance();
            $entityManager->persist($account);
        }
        $entityManager->flush();

        unset($accounts);
        $accounts = $this->getUser()->getAccounts();
        foreach ( $accounts as $account){
            $datas['accounts'][] = $account;
        }

        return $this->render('dashboard/dashboard-financial-component.html.twig', array(
            'datas' => $datas
        ));
    }

    public function financialComponentSumPerDayAction($id)
    {
        $datas = [];
        $datas['accounts'] = [];
        $account = $this->getUser()->getAccount($id);

        $balance = $account->getBalance();

        $actualMonth = intval(date('m'));
        $actualYear = intval(date('Y'));
        $totalMonthDay = cal_days_in_month(CAL_GREGORIAN, $actualMonth, $actualYear);
        $actualMonthDay = intval(date('j'));

        $restDay = $totalMonthDay - $actualMonthDay;
        $sumPerDay = number_format($balance/$restDay, 2);

        return $this->render('dashboard/dashboard-financial-component-sumPerDay.html.twig', array(
            'sum' => $sumPerDay
        ));
    }

    public function financialComponentLeftPercentAction($id)
    {
        $datas = [];
        $datas['accounts'] = [];
        $account = $this->getUser()->getAccount($id);

        $balance = $account->getBalance();
        $atfirstBalance = $account->getAtFirstBalance();

        if ($atfirstBalance != 0) {
            $percent = number_format(($balance*100)/$atfirstBalance, 2);
        } else {
            $percent = "error ";
        }

        return $this->render('dashboard/dashboard-financial-component-leftPercent.html.twig', array(
            'percent' => $percent
        ));
    }

    public function financialComponentSpendPercentAction($id)
    {
        $datas = [];
        $datas['accounts'] = [];
        $account = $this->getUser()->getAccount($id);

        $balance = $account->getBalance();
        $spendSum = $this->getDoctrine()->getRepository(OperationMinus::class)->findSumOperationMinus($account);

        if ($balance != 0) {
            $percent = number_format(($spendSum * 100) / $balance, 2);
        } else {
            $percent = "error ";
        }

        return $this->render('dashboard/dashboard-financial-component-spendPercent.html.twig', array(
            'percent' => $percent
        ));
    }

}
