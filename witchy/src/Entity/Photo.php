<?php

namespace App\Entity;

use App\Repository\PhotoRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PhotoRepository::class)]
class Photo
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $src = null;

    #[ORM\Column]
    private ?bool $isprimary = null;

    #[ORM\ManyToOne(inversedBy: 'photos')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Produit $RefProduit = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSrc(): ?string
    {
        return $this->src;
    }

    public function setSrc(string $src): self
    {
        $this->src = $src;

        return $this;
    }

    public function isIsprimary(): ?bool
    {
        return $this->isprimary;
    }

    public function setIsprimary(bool $isprimary): self
    {
        $this->isprimary = $isprimary;

        return $this;
    }

    public function getRefProduit(): ?Produit
    {
        return $this->RefProduit;
    }

    public function setRefProduit(?Produit $RefProduit): self
    {
        $this->RefProduit = $RefProduit;

        return $this;
    }
}
