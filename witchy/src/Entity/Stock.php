<?php

namespace App\Entity;

use App\Repository\StockRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StockRepository::class)]
class Stock
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'stocks')]
    private ?Fournisseur $RefFournisseur = null;

    #[ORM\ManyToOne(inversedBy: 'stocks')]
    private ?Produit $RefProduit = null;

    #[ORM\Column]
    private ?int $quantite = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRefFournisseur(): ?Fournisseur
    {
        return $this->RefFournisseur;
    }

    public function setRefFournisseur(?Fournisseur $RefFournisseur): self
    {
        $this->RefFournisseur = $RefFournisseur;

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
