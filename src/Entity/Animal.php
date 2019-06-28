<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AnimalRepository")
 */
class Animal
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
     * @ORM\Column(type="date")
     */
    private $data_nascimento;

    /**
     * 
     * @ORM\ManyToMany(targetEntity="Cliente", mappedBy="animal")
     */
    private $cliente;

    /**
     * 
     * @ORM\ManyToOne(targetEntity="Raca", inversedBy="id")
     */
    private $raca;

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

    public function getDataNascimento(): ?\DateTimeInterface
    {
        return $this->data_nascimento;
    }

    public function setDataNascimento(\DateTimeInterface $data_nascimento): self
    {
        $this->data_nascimento = $data_nascimento;

        return $this;
    }

    public function getCliente(): ?object
    {
        return $this->cliente;
    }

    public function setCliente(?object $cliente): self
    {
        $this->cliente = $cliente;

        return $this;
    }

    public function getRaca(): ?object
    {
        return $this->raca;
    }

    public function setRaca(?object $raca): self
    {
        $this->raca = $raca;

        return $this;
    }

}
