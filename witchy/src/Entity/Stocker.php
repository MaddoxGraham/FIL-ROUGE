<?php

namespace App\Entity;

use App\Repository\StockerRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StockerRepository::class)]
class Stocker
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    private ?Produits $RefProduit = null;

    #[ORM\ManyToOne]
    private ?Fournisseurs $RefFournisseur = null;

    #[ORM\Column]
    private ?int $quantite = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRefProduit(): ?Produits
    {
        return $this->RefProduit;
    }

    public function setRefProduit(?Produits $RefProduit): self
    {
        $this->RefProduit = $RefProduit;

        return $this;
    }

    public function getRefFournisseur(): ?Fournisseurs
    {
        return $this->RefFournisseur;
    }

    public function setRefFournisseur(?Fournisseurs $RefFournisseur): self
    {
        $this->RefFournisseur = $RefFournisseur;

        return $this;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }
}
