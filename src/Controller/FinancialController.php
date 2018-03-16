<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FinancialController extends Controller
{
    /**
     * @Route("/financial", name="financial")
     */
    public function index()
    {
        return $this->render('financial/financial.html.twig');
    }

    /**
     * @Route("/financial/edit/{id}", name="financial_edit")
     */
    public function editAction($id)
    {
        $datas = [];
        $datas['account'] = $this->getUser()->getAccount(intval($id));
        $datas['operationsP'] = $datas['account']->getOperationsPlus();
        $datas['operationsM'] = $datas['account']->getOperationsMinus();

        return $this->render('financial/financialEdit.html.twig', array(
            'datas' => $datas
        ));
    }
}
