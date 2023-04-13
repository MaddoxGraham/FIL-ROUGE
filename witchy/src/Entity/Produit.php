<?php

namespace App\Entity;

use App\Entity\Trait\SlugTrait;
use App\Repository\ProduitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProduitRepository::class)]
class Produit
{
    use SlugTrait;
    
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $ShortLibel = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $LongLibel = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 8, scale: 2, nullable: true)]
    private ?string $prxHt = null;

    #[ORM\Column(length: 255)]
    private ?string $slug = null;

    #[ORM\OneToMany(mappedBy: 'RefProduit', targetEntity: Photo::class)]
    private Collection $photos;

    #[ORM\OneToMany(mappedBy: 'RefProduit', targetEntity: LigneCommande::class, orphanRemoval: true)]
    private Collection $ligneCommandes;

    #[ORM\OneToMany(mappedBy: 'RefProduit', targetEntity: Liste::class)]
    private Collection $listes;

    #[ORM\OneToMany(mappedBy: 'RefProduit', targetEntity: Stock::class)]
    private Collection $stocks;

    #[ORM\ManyToOne(inversedBy: 'produits')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Categorie $categorie = null;

    public function __construct()
    {
        $this->photos = new ArrayCollection();
        $this->ligneCommandes = new ArrayCollection();
        $this->listes = new ArrayCollection();
        $this->stocks = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getShortLibel(): ?string
    {
        return $this->ShortLibel;
    }

    public function setShortLibel(string $ShortLibel): self
    {
        $this->ShortLibel = $ShortLibel;

        return $this;
    }

    public function getLongLibel(): ?string
    {
        return $this->LongLibel;
    }

    public function setLongLibel(?string $LongLibel): self
    {
        $this->LongLibel = $LongLibel;

        return $this;
    }

    public function getPrxHt(): ?string
    {
        return $this->prxHt;
    }

    public function setPrxHt(?string $prxHt): self
    {
        $this->prxHt = $prxHt;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * @return Collection<int, Photo>
     */
    public function getPhotos(): Collection
    {
        return $this->photos;
    }

    public function addPhoto(Photo $photo): self
    {
        if (!$this->photos->contains($photo)) {
            $this->photos->add($photo);
            $photo->setRefProduit($this);
        }

        return $this;
    }

    public function removePhoto(Photo $photo): self
    {
        if ($this->photos->removeElement($photo)) {
            // set the owning side to null (unless already changed)
            if ($photo->getRefProduit() === $this) {
                $photo->setRefProduit(null);
            }
        }

        return $this;
    }


    /**
     * @return Collection<int, LigneCommande>
     */
    public function getLigneCommandes(): Collection
    {
        return $this->ligneCommandes;
    }

    public function addLigneCommande(LigneCommande $ligneCommande): self
    {
        if (!$this->ligneCommandes->contains($ligneCommande)) {
            $this->ligneCommandes->add($ligneCommande);
            $ligneCommande->setRefProduit($this);
        }

        return $this;
    }

    public function removeLigneCommande(LigneCommande $ligneCommande): self
    {
        if ($this->ligneCommandes->removeElement($ligneCommande)) {
            // set the owning side to null (unless already changed)
            if ($ligneCommande->getRefProduit() === $this) {
                $ligneCommande->setRefProduit(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Liste>
     */
    public function getListes(): Collection
    {
        return $this->listes;
    }

    public function addListe(Liste $liste): self
    {
        if (!$this->listes->contains($liste)) {
            $this->listes->add($liste);
            $liste->setRefProduit($this);
        }

        return $this;
    }

    public function removeListe(Liste $liste): self
    {
        if ($this->listes->removeElement($liste)) {
            // set the owning side to null (unless already changed)
            if ($liste->getRefProduit() === $this) {
                $liste->setRefProduit(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Stock>
     */
    public function getStocks(): Collection
    {
        return $this->stocks;
    }

    public function addStock(Stock $stock): self
    {
        if (!$this->stocks->contains($stock)) {
            $this->stocks->add($stock);
            $stock->setRefProduit($this);
        }

        return $this;
    }

    public function removeStock(Stock $stock): self
    {
        if ($this->stocks->removeElement($stock)) {
            // set the owning side to null (unless already changed)
            if ($stock->getRefProduit() === $this) {
                $stock->setRefProduit(null);
            }
        }

        return $this;
    }

    public function getCategorie(): ?Categorie
    {
        return $this->categorie;
    }

    public function setCategorie(?Categorie $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }
}
