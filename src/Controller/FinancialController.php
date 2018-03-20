<?php

namespace App\Controller;

use App\Entity\Account;
use App\Entity\OperationMinus;
use App\Entity\OperationPlus;
use App\Form\AccountType;
use App\Form\OperationMinusType;
use App\Form\OperationPlusType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FinancialController extends Controller
{

    /**
     * @Route("/financial/edit/{id}", name="financial_edit")
     */
    public function editAction($id)
    {
        $datas = [];
        $datas['account'] = $this->getUser()->getAccount(intval($id));
        $datas['operationsP'] = $datas['account']->getOperationsPlus();
        $datas['operationsM'] = $datas['account']->getOperationsMinus();

        return $this->render('financial/financial-edit.html.twig', array(
            'datas' => $datas
        ));
    }

    /**
     * @Route("/financial/edit/account/{idA}", name="financial_edit_account")
     */
    public function editAccountAction($idA, Request $request)
    {
        $account = $this->getUser()->getAccount(intval($idA));

        $form = $this->createForm(AccountType::class, $account);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $account = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($account);
            $entityManager->flush();

            $this->addFlash('success',
              'La modification a été effectuée avec succès!'
            );

            return $this->render('financial/financial-edit-fields.html.twig', array(
                'form' => $form->createView(),
                'idA' => $idA
            ));
        }

        return $this->render('financial/financial-edit-fields.html.twig', array(
            'form' => $form->createView(),
            'idA' => $idA
        ));
    }

    /**
     * @Route("/financial/add/operation/{idA}/{type}", name="financial_add_operation")
     */
    public function addOperationAction($idA, $type, Request $request)
    {
        $account = $this->getUser()->getAccount(intval($idA));
        $entityManager = $this->getDoctrine()->getManager();

        if($type === 'credit') {
            $operation = new OperationPlus();
            $form = $this->createForm(OperationPlusType::class, $operation, array(
                'entity_manager' => $entityManager,
            ));
        } else if ($type === 'debit') {
            $operation = new OperationMinus();
            $form = $this->createForm(OperationMinusType::class, $operation, array(
                'entity_manager' => $entityManager,
            ));
        }

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $operation = $form->getData();
            $tmpBalance = $account->getBalance();

            if ($type === "credit"){
                if ($operation->getIsCredit() === true) {
                    $balance = $tmpBalance + $operation->getSum();
                    $account->setBalance($balance);
                }
            } elseif ($type === "debit"){
                if ($operation->getIsDebit() === true) {
                    $balance = $tmpBalance - $operation->getSum();
                    $account->setBalance($balance);
                }
            }
            $operation->setAccount($account);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($operation);
            $entityManager->persist($account);
            $entityManager->flush();

            return $this->redirectToRoute('financial_edit', array('id' => intval($idA)));
        }

        return $this->render('financial/financial-edit-fields.html.twig', array(
            'form' => $form->createView(),
            'idA' => $idA
        ));
    }

    /**
     * @Route("/financial/edit/operation/{idA}/{idO}/{type}", name="financial_edit_operation")
     */
    public function editOperationAction($idA, $idO, $type, Request $request)
    {
        $account = $this->getUser()->getAccount(intval($idA));
        $entityManager = $this->getDoctrine()->getManager();

        if ($type === "credit"){
            $operation = $account->getOperationPlus(intval($idO));
            $form = $this->createForm(OperationPlusType::class, $operation, array(
                'entity_manager' => $entityManager,
            ));
            $lastV = $operation->getSum();
            $lastState = $operation->getIsCredit();
        } elseif ($type === "debit"){
            $operation = $account->getOperationMinus(intval($idO));
            $form = $this->createForm(OperationMinusType::class, $operation, array(
                'entity_manager' => $entityManager,
            ));
            $lastV = $operation->getSum();
            $lastState = $operation->getIsDebit();
        }

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $operation = $form->getData();
            $tmpBalance = $account->getBalance();

            if ($type === "credit"){
                if ($operation->getIsCredit() === true) {
                    if ($lastState === false) {
                        $balance = $tmpBalance + $operation->getSum();
                    } else {
                        $balance = $tmpBalance - $lastV + $operation->getSum();
                    }
                    $account->setBalance($balance);
                } else {
                    if ($lastState != false) {
                        $balance = $tmpBalance - $operation->getSum();
                        $account->setBalance($balance);
                    }
                }
            } elseif ($type === "debit"){
                if ($operation->getIsDebit() === true) {
                    if ($lastState === false) {
                        $balance = $tmpBalance - $operation->getSum();
                    } else {
                        $balance = $tmpBalance + $lastV - $operation->getSum();
                    }
                    $account->setBalance($balance);
                } else {
                    if ($lastState != false) {
                        $balance = $tmpBalance + $operation->getSum();
                        $account->setBalance($balance);
                    }
                }
            }

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($operation);
            $entityManager->persist($account);
            $entityManager->flush();

            $this->addFlash('success',
                'La modification a été effectuée avec succès!'
            );

            return $this->render('financial/financial-edit-fields.html.twig', array(
                'form' => $form->createView(),
                'idA' => $idA
            ));
        }

        return $this->render('financial/financial-edit-fields.html.twig', array(
            'form' => $form->createView(),
            'idA' => $idA
        ));

    }

    /**
     * @Route("/financial/operationp/remove/{idA}/{idO}", name="financial_remove_operation_plus")
     */
    public function removeOperationPlusAction($idA, $idO)
    {
        $account = $this->getUser()->getAccount(intval($idA));
        $operationPlus = $account->getOperationPlus(intval($idO));
        $operationPlus->invalidateOperationPlus();
        $entityManager = $this->getDoctrine()->getManager();
        $account->removeOperationPlus($operationPlus);
        $entityManager->persist($account);
        $entityManager->flush();

        return $this->redirectToRoute('financial_edit', array('id' => intval($idA)));
    }

    /**
     * @Route("/financial/operationm/remove/{idA}/{idO}", name="financial_remove_operation_minus")
     */
    public function removeOperationMinusAction($idA, $idO)
    {
        $account = $this->getUser()->getAccount(intval($idA));
        $operationMinus = $account->getOperationMinus(intval($idO));
        $operationMinus->invalidateOperationMinus();
        $entityManager = $this->getDoctrine()->getManager();
        $account->removeOperationMinus($operationMinus);
        $entityManager->persist($account);
        $entityManager->flush();

        return $this->redirectToRoute('financial_edit', array('id' => intval($idA)));
    }

    /**
     * @Route("/financial/operationm/removeall/{idA}", name="financial_remove_all_operation_minus")
     */
    public function removeAllOperationMinusAction($idA)
    {
        $account = $this->getUser()->getAccount(intval($idA));
        $operationsMinus = $account->getOperationsMinus();
        foreach ($operationsMinus as $operation) {
            $operation->invalidateOperationMinus();
            $entityManager = $this->getDoctrine()->getManager();
            $account->removeOperationMinus($operation);
        }
        $entityManager->persist($account);
        $entityManager->flush();

        return $this->redirectToRoute('financial_edit', array('id' => intval($idA)));
    }

    /**
     * @Route("/financial/operationp/removeall/{idA}", name="financial_remove_all_operation_plus")
     */
    public function removeAllOperationPlusAction($idA)
    {
        $account = $this->getUser()->getAccount(intval($idA));
        $operationsPlus = $account->getOperationsPlus();
        foreach ($operationsPlus as $operation) {
            $operation->invalidateOperationPlus();
            $entityManager = $this->getDoctrine()->getManager();
            $account->removeOperationPlus($operation);
        }
        $entityManager->persist($account);
        $entityManager->flush();

        return $this->redirectToRoute('financial_edit', array('id' => intval($idA)));
    }

    public function financialComponentIncomingAction($id)
    {
        $account = $this->getUser()->getAccount($id);

        $number = 0;

        foreach ($account->getOperationsMinus() as $opM) {
            if ($opM->getIsDebit() === false) {
                $number += $opM->getSum();
            }
        }

        return $this->render('dashboard/dashboard-financial-component-inComing.html.twig', array(
            'sum' => $number
        ));
    }

    public function financialComponentSpendPercentAction($id)
    {
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

    public function financialComponentSumPerDayAction($id)
    {
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

    /**
     * @Route("/financial/operationp/invalidate/all/{idA}", name="financial_invalidate_operation_plus")
     */
    public function invalidateOpPAllAction($idA) {
        $account = $this->getUser()->getAccount(intval($idA));
        $operations = $account->getOperationsPlus();
        foreach ($operations as $operation) {
            $operation->invalidateOperationPlus();
        }

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($account);
        $entityManager->flush();

        return $this->redirectToRoute('financial_edit', array('id' => intval($idA)));
    }

    /**
     * @Route("/financial/operationm/invalidate/all/{idA}", name="financial_invalidate_operation_minus")
     */
    public function invalidateOpMAllAction($idA) {
        $account = $this->getUser()->getAccount(intval($idA));
        $operations = $account->getOperationsMinus();
        foreach ($operations as $operation) {
            $operation->invalidateOperationMinus();
        }

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($account);
        $entityManager->flush();

        return $this->redirectToRoute('financial_edit', array('id' => intval($idA)));
    }

    /**
     * @Route("/financial/operationp/validate/all/{idA}", name="financial_validate_operation_plus")
     */
    public function validateOpPAllAction($idA) {
        $account = $this->getUser()->getAccount(intval($idA));
        $operations = $account->getOperationsPlus();
        foreach ($operations as $operation) {
            $operation->validateOperationPlus();
        }

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($account);
        $entityManager->flush();

        return $this->redirectToRoute('financial_edit', array('id' => intval($idA)));
    }

    /**
     * @Route("/financial/operationm/validate/all/{idA}", name="financial_validate_operation_minus")
     */
    public function validateOpMAllAction($idA) {
        $account = $this->getUser()->getAccount(intval($idA));
        $operations = $account->getOperationsMinus();
        foreach ($operations as $operation) {
            $operation->validateOperationMinus();
        }

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($account);
        $entityManager->flush();

        return $this->redirectToRoute('financial_edit', array('id' => intval($idA)));
    }

    public function navbarAction ($idA, $page) {
        return $this->render('financial/financial-navbar.html.twig', array(
            'idA' => $idA,
            'page' => $page
        ));
    }

//    /**
//     * @Route("/financial/account/add", name="financial_account_add")
//     * @Method("POST")
//     */
//    public function addAccountAction (Request $request) {
//
//        $account = new Account();
//        $form = $this->createForm(AccountType::class, $account);
//        $form->handleRequest($request);
//
//        if ($form->isSubmitted() && $form->isValid()) {
//
//            $account = $form->getData();
//
//            $entityManager = $this->getDoctrine()->getManager();
//            $entityManager->persist($account);
//            $entityManager->persist($this->getUser());
//            $entityManager->flush();
//
//            return new JsonResponse(array('message' => 'Success!'), 200);
//        }
//
//        return new JsonResponse(array('message' => 'Error!'), 200);
//    }
}
