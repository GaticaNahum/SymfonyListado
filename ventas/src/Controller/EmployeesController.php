<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EmployeesController extends AbstractController
{

    public function getEmployees(){
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery("select e.employeenumber,e.lastname,e.firstname,e.extension,e.email from App:Employees e");
        $listemployees = $query->getResult();        

        return $this->render('Employees.html.twig', [
            'lista' => $listemployees
        ]);
    }
}
