<?php

namespace App\Entity;

use App\Repository\StockRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StockRepository::class)]
class Stock
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?int $quantite = null;

    #[ORM\OneToMany(mappedBy: 'stock', targetEntity: Produit::class)]
    private Collection $RefProduit;

    public function __construct()
    {
        $this->RefProduit = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(?int $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }

    /**
     * @return Collection<int, Produit>
     */
    public function getRefProduit(): Collection
    {
        return $this->RefProduit;
    }

    public function addRefProduit(Produit $refProduit): self
    {
        if (!$this->RefProduit->contains($refProduit)) {
            $this->RefProduit->add($refProduit);
            $refProduit->setStock($this);
        }

        return $this;
    }

    public function removeRefProduit(Produit $refProduit): self
    {
        if ($this->RefProduit->removeElement($refProduit)) {
            // set the owning side to null (unless already changed)
            if ($refProduit->getStock() === $this) {
                $refProduit->setStock(null);
            }
        }

        return $this;
    }
}
