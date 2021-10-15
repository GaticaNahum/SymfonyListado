<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OrdersController extends AbstractController
{
    public function getOrder(){
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery("select o.ordernumber,o.orderdate,o.requiredate,o.shippeddate,o.status,o.comments,o.customernumber from App:Orders o");
        $listorder = $query->getResult();        

        return $this->render('Orders.html.twig', [
            'lista' => $listorder
        ]);
    }
}
