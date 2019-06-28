<?php

namespace App\Controller;

use App\Entity\Cliente;
use App\Form\ClienteType;
use Symfony\Component\VarDumper\VarDumper;
use Symfony\Component\HttpFoundation\Request;
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

    public function view(Cliente $cliente){

        return $this->render('clientes/view.html.twig',[
            'cliente' => $cliente
        ]);
    }

    public function create(Request $request)
    {

        $cliente = new Cliente();
        $form = $this->createForm(ClienteType::class, $cliente);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $em = $this->getDoctrine()->getManager();
            $em->persist($cliente);
            $em->flush();

            $this->addFlash('success', 'Cliente Adicionado com sucesso!');
            
            return $this->redirectToRoute('listar_clientes');
        }
        
        return $this->render('clientes/create.html.twig',[
            'form' => $form->createView()
        ]);
    }
}
