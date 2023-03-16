<?php

namespace App\Entity;

use App\Repository\CommandesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Column;

#[ORM\Entity(repositoryClass: CommandesRepository::class)]
class Commandes
{
    #[ORM\Id,Column]
    private ?int $idCom = null;

    #[ORM\Id,Column]
    private ?\DateTimeImmutable $dateCom = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: '0', nullable: true)]
    private ?string $reduction = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: '0', nullable: true)]
    private ?string $TotalTTC = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $statut = null;

    #[ORM\ManyToOne(inversedBy: 'commandes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Clients $idClient = null;

    public function getIdCom(): ?int
    {
        return $this->idCom;
    }

    public function getDateCom(): ?\DateTimeImmutable
    {
        return $this->dateCom;
    }

    public function setDateCom(\DateTimeImmutable $dateCom): self
    {
        $this->dateCom = $dateCom;

        return $this;
    }

    public function getReduction(): ?string
    {
        return $this->reduction;
    }

    public function setReduction(?string $reduction): self
    {
        $this->reduction = $reduction;

        return $this;
    }

    public function getTotalTTC(): ?string
    {
        return $this->TotalTTC;
    }

    public function setTotalTTC(?string $TotalTTC): self
    {
        $this->TotalTTC = $TotalTTC;

        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(?string $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    public function getIdClient(): ?Clients
    {
        return $this->idClient;
    }

    public function setIdClient(?Clients $idClient): self
    {
        $this->idClient = $idClient;

        return $this;
    }
}
