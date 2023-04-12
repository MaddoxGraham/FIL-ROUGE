<?php

namespace App\Entity;

use App\Entity\Trait\CreatedAtTrait;
use App\Repository\CommandeRepository;
use DateTimeImmutable;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommandeRepository::class)]
class Commande
{
    use CreatedAtTrait;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?int $reduction = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 8, scale: 2)]
    private ?string $TotalTTC = null;

    #[ORM\Column(length: 255)]
    private ?string $statut = null;

    #[ORM\ManyToOne(inversedBy: 'commandes')]
    private ?Client $client = null;

    #[ORM\OneToMany(mappedBy: 'idCom', targetEntity: Historique::class)]
    private Collection $historiques;

    #[ORM\OneToMany(mappedBy: 'idCom', targetEntity: LigneCommande::class, orphanRemoval: true)]
    private Collection $ligneCommandes;

    #[ORM\OneToMany(mappedBy: 'idCom', targetEntity: Facture::class, orphanRemoval: true)]
    private Collection $factures;

    #[ORM\OneToMany(mappedBy: 'idCom', targetEntity: Livraison::class)]
    private Collection $livraisons;

    public function __construct()
    {
        $this->historiques = new ArrayCollection();
        $this->ligneCommandes = new ArrayCollection();
        $this->factures = new ArrayCollection();
        $this->livraisons = new ArrayCollection();
        $this->created_at =new DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getReduction(): ?int
    {
        return $this->reduction;
    }

    public function setReduction(?int $reduction): self
    {
        $this->reduction = $reduction;

        return $this;
    }

    public function getTotalTTC(): ?string
    {
        return $this->TotalTTC;
    }

    public function setTotalTTC(string $TotalTTC): self
    {
        $this->TotalTTC = $TotalTTC;

        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }

    /**
     * @return Collection<int, Historique>
     */
    public function getHistoriques(): Collection
    {
        return $this->historiques;
    }

    public function addHistorique(Historique $historique): self
    {
        if (!$this->historiques->contains($historique)) {
            $this->historiques->add($historique);
            $historique->setIdCom($this);
        }

        return $this;
    }

    public function removeHistorique(Historique $historique): self
    {
        if ($this->historiques->removeElement($historique)) {
            // set the owning side to null (unless already changed)
            if ($historique->getIdCom() === $this) {
                $historique->setIdCom(null);
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
            $ligneCommande->setIdCom($this);
        }

        return $this;
    }

    public function removeLigneCommande(LigneCommande $ligneCommande): self
    {
        if ($this->ligneCommandes->removeElement($ligneCommande)) {
            // set the owning side to null (unless already changed)
            if ($ligneCommande->getIdCom() === $this) {
                $ligneCommande->setIdCom(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Facture>
     */
    public function getFactures(): Collection
    {
        return $this->factures;
    }

    public function addFacture(Facture $facture): self
    {
        if (!$this->factures->contains($facture)) {
            $this->factures->add($facture);
            $facture->setIdCom($this);
        }

        return $this;
    }

    public function removeFacture(Facture $facture): self
    {
        if ($this->factures->removeElement($facture)) {
            // set the owning side to null (unless already changed)
            if ($facture->getIdCom() === $this) {
                $facture->setIdCom(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Livraison>
     */
    public function getLivraisons(): Collection
    {
        return $this->livraisons;
    }

    public function addLivraison(Livraison $livraison): self
    {
        if (!$this->livraisons->contains($livraison)) {
            $this->livraisons->add($livraison);
            $livraison->setIdCom($this);
        }

        return $this;
    }

    public function removeLivraison(Livraison $livraison): self
    {
        if ($this->livraisons->removeElement($livraison)) {
            // set the owning side to null (unless already changed)
            if ($livraison->getIdCom() === $this) {
                $livraison->setIdCom(null);
            }
        }

        return $this;
    }
}
