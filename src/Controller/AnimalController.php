<?php

namespace App\Controller;

use App\Entity\Animal;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AnimalController extends AbstractController
{

    public function index()
    {
        $em = $this->getDoctrine()->getManager();
        
        $animais = $em->getRepository(Animal::class)->findAll();
        
        return $this->render('animal/index.html.twig', [
            'animais' => $animais,
        ]);
    }

    public function view(Animal $animal)
    {
        return $this->render('animal/view.html.twig',[
            'animal' => $animal
        ]);
    }
}
