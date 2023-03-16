<?php

namespace App\Entity;

use App\Repository\ProduitsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProduitsRepository::class)]
class Produits
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $shortLibel = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $longLibel = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: '0', nullable: true)]
    private ?string $prxHT = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Categories $idCat = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getShortLibel(): ?string
    {
        return $this->shortLibel;
    }

    public function setShortLibel(string $shortLibel): self
    {
        $this->shortLibel = $shortLibel;

        return $this;
    }

    public function getLongLibel(): ?string
    {
        return $this->longLibel;
    }

    public function setLongLibel(?string $longLibel): self
    {
        $this->longLibel = $longLibel;

        return $this;
    }

    public function getPrxHT(): ?string
    {
        return $this->prxHT;
    }

    public function setPrxHT(?string $prxHT): self
    {
        $this->prxHT = $prxHT;

        return $this;
    }

    public function getIdCat(): ?Categories
    {
        return $this->idCat;
    }

    public function setIdCat(?Categories $idCat): self
    {
        $this->idCat = $idCat;

        return $this;
    }
}
