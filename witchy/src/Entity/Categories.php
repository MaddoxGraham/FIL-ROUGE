<?php

namespace App\Entity;

use App\Repository\CategoriesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoriesRepository::class)]
class Categories
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nomination = null;

    #[ORM\ManyToOne(targetEntity: self::class)]
    private ?self $sous_categorie = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomination(): ?string
    {
        return $this->nomination;
    }

    public function setNomination(string $nomination): self
    {
        $this->nomination = $nomination;

        return $this;
    }

    public function getSousCategorie(): ?self
    {
        return $this->sous_categorie;
    }

    public function setSousCategorie(?self $sous_categorie): self
    {
        $this->sous_categorie = $sous_categorie;

        return $this;
    }
}
