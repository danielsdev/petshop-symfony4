<?php

namespace App\Controller;

use App\Entity\Cliente;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ClienteController extends AbstractController
{

    public function index()
    {
        $em = $this->getDoctrine()->getManager();

        $clientes = $em->getRepository(Cliente::class)->findAll();

        return $this->render("clientes/index.html.twig",[
            'clientes' => $clientes
        ]);  
    }
}
