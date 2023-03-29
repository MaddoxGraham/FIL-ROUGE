<?php

namespace App\Entity;

use App\Repository\ProduitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProduitRepository::class)]
class Produit
{
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

    #[ORM\ManyToMany(targetEntity: Categorie::class, inversedBy: 'produits')]
    private Collection $idCat;

    #[ORM\OneToMany(mappedBy: 'RefProduit', targetEntity: Photo::class)]
    private Collection $photos;

    #[ORM\ManyToOne(inversedBy: 'RefProduit')]
    private ?Stock $stock = null;

    public function __construct()
    {
        $this->idCat = new ArrayCollection();
        $this->photos = new ArrayCollection();
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
     * @return Collection<int, Categorie>
     */
    public function getIdCat(): Collection
    {
        return $this->idCat;
    }

    public function addIdCat(Categorie $idCat): self
    {
        if (!$this->idCat->contains($idCat)) {
            $this->idCat->add($idCat);
        }

        return $this;
    }

    public function removeIdCat(Categorie $idCat): self
    {
        $this->idCat->removeElement($idCat);

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

    public function getStock(): ?Stock
    {
        return $this->stock;
    }

    public function setStock(?Stock $stock): self
    {
        $this->stock = $stock;

        return $this;
    }
}
