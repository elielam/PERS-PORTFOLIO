<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use App\Entity\Todo;

class TodoController extends Controller
{


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
}
