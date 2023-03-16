<?php

namespace App\Entity;

use App\Repository\HabiteRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Column;

#[ORM\Entity(repositoryClass: HabiteRepository::class)]
class Habite
{

    #[ORM\Id,Column]
    #[ORM\OneToMany()]
    #[ORM\JoinColumn(nullable: false)]
    private ?Clients $idClient = null;

    #[ORM\Id,Column]
    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Adresses $idAdresse = null;


    public function getIdClient(): ?Clients
    {
        return $this->idClient;
    }

    public function setIdClient(?Clients $idClient): self
    {
        $this->idClient = $idClient;

        return $this;
    }

    public function getIdAdresse(): ?Adresses
    {
        return $this->idAdresse;
    }

    public function setIdAdresse(?Adresses $idAdresse): self
    {
        $this->idAdresse = $idAdresse;

        return $this;
    }
}
