<?php

namespace App\Controller;

use App\Entity\Animal;
use App\Entity\Cliente;
use Symfony\Component\VarDumper\VarDumper;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DefaultController extends AbstractController
{
    /**
     * 
     * @Template("default/index.html.twig")
     * 
     */
    public function index()
    {
        $em = $this->getDoctrine()->getManager();

        $qtd_animais = $em->getRepository(Cliente::class)->qtsAnimaisPorCliente();

        $qtd_racas = $em->getRepository(Animal::class)->qtdPorRaca();

        return [
            'qtd_animais' => $qtd_animais,
            'qtd_racas'   => $qtd_racas
        ];
    }
}
