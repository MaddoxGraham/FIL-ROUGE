<?php

namespace App\Entity;

use App\Repository\FacturesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FacturesRepository::class)]
class Factures
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $delaisPayement = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $modePayement = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $datePayement = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDelaisPayement(): ?\DateTimeInterface
    {
        return $this->delaisPayement;
    }

    public function setDelaisPayement(?\DateTimeInterface $delaisPayement): self
    {
        $this->delaisPayement = $delaisPayement;

        return $this;
    }

    public function getModePayement(): ?string
    {
        return $this->modePayement;
    }

    public function setModePayement(?string $modePayement): self
    {
        $this->modePayement = $modePayement;

        return $this;
    }

    public function getDatePayement(): ?\DateTimeInterface
    {
        return $this->datePayement;
    }

    public function setDatePayement(?\DateTimeInterface $datePayement): self
    {
        $this->datePayement = $datePayement;

        return $this;
    }
}
