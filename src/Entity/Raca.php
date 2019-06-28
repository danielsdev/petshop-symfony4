<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RacaRepository")
 */
class Raca
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $nome;

    /**
     * 
     * @ORM\ManyToOne(targetEntity="Especie", inversedBy="id")
     */
    private $especie;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNome(): ?string
    {
        return $this->nome;
    }

    public function setNome(string $nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    public function getEspecie(): ?object
    {
        return $this->especie;
    }

    public function setEspecie(?object $especie): self
    {
        $this->especie = $especie;

        return $this;
    }

    public function getnomeEspecie(){

        return $this->getEspecie() ? $this->getEspecie()->getNome() : null;
    }
}
