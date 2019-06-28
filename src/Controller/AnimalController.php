<?php

namespace App\Controller;

use App\Entity\Animal;
use App\Form\AnimalType;
use Symfony\Component\HttpFoundation\Request;
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

    public function create(Request $request)
    {

        $animal = new Animal();
        $form = $this->createForm(AnimalType::class, $animal);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $em = $this->getDoctrine()->getManager();

            $em->persist($animal);
            $em->flush();

            $this->addFlash('success', 'Animal cadastrado com sucesso!');
        }

        return $this->render('animal/create.html.twig',[
            'form' => $form->createView()
        ]);
    }
}
