<?php

namespace App\Form;

use App\Entity\Endereco;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class EnderecoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('rua', TextType::class, [
                'label' => 'Rua',
                'attr'  => [
                    'placeholder' => 'Informe o nome da rua',
                    'class' => 'form-control'
                ]
            ])
            ->add('numero', TextType::class, [
                'label' => 'Numero',
                'attr'  => [
                    'placeholder' => 'Informe o numero',
                    'class' => 'form-control'
                ]
            ])
            ->add('bairro', TextType::class, [
                'label' => 'Bairro',
                'attr'  => [
                    'placeholder' => 'Informe o nome do bairro',
                    'class' => 'form-control'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Endereco::class,
        ]);
    }
}
