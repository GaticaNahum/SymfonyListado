<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OfficesController extends AbstractController
{
    public function getOffices(){
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery("select o.officecode,o.city,o.phone,o.addressline1,o.addressline2,o.state,o.country,o.postalcode,o.territory from App:Offices o");
        $listoffices = $query->getResult();        

        return $this->render('Offices.html.twig', [
            'lista' => $listoffices
        ]);
    }
}

