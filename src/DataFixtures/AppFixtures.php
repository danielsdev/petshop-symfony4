<?php

namespace App\DataFixtures;

use App\Entity\Raca;
use App\Entity\Cliente;
use App\Entity\Especie;
use App\Entity\Endereco;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        $especies = [
            'Cachorro' => [
                ['nome' => 'SRD'],
                ['nome' => 'Boxer'],
                ['nome' => 'Shihtzu'],
                ['nome' => 'Poodle'],
            ],
            'Gato' => [
                ['nome' => 'SRD'],
                ['nome' => 'Siamés'],
                ['nome' => 'Angorá'],
            ]
        ];

        foreach($especies as $especie => $racas){

            $obj = new Especie();
            $obj->setNome($especie);

            $manager->persist($obj);

            foreach($racas as $raca){

                $obj2 = new Raca();
                $obj2->setNome($raca['nome']);
                $obj2->setEspecie($obj);

                $manager->persist($obj2);
            }
        }

        $obj4 = new Endereco();

        $obj4->setRua('Rua teste');
        $obj4->setBairro('tal');
        $obj4->setNumero('123');

        $manager->persist($obj4);

        $obj3 = new Cliente();

        $obj3->setNome('Daniel Lima');
        $obj3->setEmail('danielrlima2012@gmail.com');
        $obj3->setTelefone('88994907739');
        $obj3->setEndereco($obj4);

        $manager->persist($obj3);

        $manager->flush();
    }
}
