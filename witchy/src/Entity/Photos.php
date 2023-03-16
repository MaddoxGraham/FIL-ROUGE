<?php

namespace App\Entity;

use App\Repository\PhotosRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PhotosRepository::class)]
class Photos
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $src = null;

    #[ORM\Column]
    private ?bool $majorPicture = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Produits $RefProduit = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSrc(): ?string
    {
        return $this->src;
    }

    public function setSrc(?string $src): self
    {
        $this->src = $src;

        return $this;
    }

    public function isMajorPicture(): ?bool
    {
        return $this->majorPicture;
    }

    public function setMajorPicture(bool $majorPicture): self
    {
        $this->majorPicture = $majorPicture;

        return $this;
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
}
