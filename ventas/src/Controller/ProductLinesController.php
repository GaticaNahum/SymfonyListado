<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductLinesController extends AbstractController
{
    public function getProductLines(){
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery("select p.productline,p.textdescription,p.htmldescription  from App:Productlines p");
        $listproductlines = $query->getResult();        

        return $this->render('ProductLines.html.twig', [
            'lista' => $listproductlines
        ]);
    }
}
