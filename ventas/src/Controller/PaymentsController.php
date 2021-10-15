<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PaymentsController extends AbstractController
{
    public function getPayments(){
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery("select p.customernumber,p.checknumber,p.paymentdate,p.amount from App:Payments p");
        $listpayments = $query->getResult();        

        return $this->render('Payments.html.twig', [
            'lista' => $listpayments
        ]);
    }
}
