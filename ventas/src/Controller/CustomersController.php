<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CustomersController extends AbstractController
{

    public function getCustomers(){
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery("select c.customernumber,c.customername,c.contactlastname,c.contactfirstname,c.phone,c.addressline1,c.addressline2,c.city,c.state,c.postalcode,c.country,c.creditlimit from App:Customers c");
        $listcustomers = $query->getResult();        

        return $this->render('customers.html.twig', [
            'lista' => $listcustomers
        ]);
    }
}
