<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductsController extends AbstractController
{

    public function getProducts(){
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery("select p.productcode,p.productname,p.productscale,p.productvendor,p.productdescription,p.quantityinstock,p.buyprice,p.msrp  from App:Products p");
        $listproducts = $query->getResult();        

        return $this->render('Products.html.twig', [
            'lista' => $listproducts
        ]);
    }
}