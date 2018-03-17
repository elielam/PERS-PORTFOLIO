<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
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
     * @Route("/financial/operationp/delete/{idA}/{idO}", name="financial_invalidate_operation_plus")
     */
    public function invalidateOperationPlusAction($idA, $idO)
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
     * @Route("/financial/operationm/delete/{idA}/{idO}", name="financial_invalidate_operation_minus")
     */
    public function invalidateOperationMinusAction($idA, $idO)
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

    public function navbarAction () {
        return $this->render('financial/financial-navbar.html.twig');
    }
}
