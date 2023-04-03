<?php

namespace App\Entity;

use App\Repository\FilmsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FilmsRepository::class)]
class Films
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 400)]
    private ?string $Titre = null;

    #[ORM\Column(length: 400)]
    private ?string $Réalisation = null;

    #[ORM\Column(length: 400)]
    private ?string $Scénario = null;

    #[ORM\Column(length: 255)]
    private ?string $Format = null;

    #[ORM\Column(nullable: true)]
    private ?int $Année = null;

    #[ORM\Column(nullable: true)]
    private ?int $Durée = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $Synopsis = null;

    #[ORM\Column(length: 400, nullable: true)]
    private ?string $Coproduction = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $Soutiens = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Distribution = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Diffusion = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $Sélections = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $Avec = null;

    #[ORM\Column(length: 400, nullable: true)]
    private ?string $Image = null;

    #[ORM\Column(length: 400, nullable: true)]
    private ?string $Son = null;

    #[ORM\Column(length: 400, nullable: true)]
    private ?string $Montage = null;

    #[ORM\Column(length: 400, nullable: true)]
    private ?string $Musique = null;

    #[ORM\Column(length: 400, nullable: true)]
    private ?string $Direction = null;

    #[ORM\Column(length: 400, nullable: true)]
    private ?string $Régie = null;

    #[ORM\Column(length: 400, nullable: true)]
    private ?string $Décors = null;

    #[ORM\Column(length: 400, nullable: true)]
    private ?string $Costumes = null;

    #[ORM\Column(length: 400, nullable: true)]
    private ?string $Etalonnage = null;

    #[ORM\ManyToOne(inversedBy: 'films')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Formats $Formats = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->Titre;
    }

    public function setTitre(string $Titre): self
    {
        $this->Titre = $Titre;

        return $this;
    }

    public function getRéalisation(): ?string
    {
        return $this->Réalisation;
    }

    public function setRéalisation(string $Réalisation): self
    {
        $this->Réalisation = $Réalisation;

        return $this;
    }

    public function getScénario(): ?string
    {
        return $this->Scénario;
    }

    public function setScénario(string $Scénario): self
    {
        $this->Scénario = $Scénario;

        return $this;
    }

    public function getFormat(): ?string
    {
        return $this->Format;
    }

    public function setFormat(string $Format): self
    {
        $this->Format = $Format;

        return $this;
    }

    public function getAnnée(): ?int
    {
        return $this->Année;
    }

    public function setAnnée(?int $Année): self
    {
        $this->Année = $Année;

        return $this;
    }

    public function getDurée(): ?int
    {
        return $this->Durée;
    }

    public function setDurée(?int $Durée): self
    {
        $this->Durée = $Durée;

        return $this;
    }

    public function getSynopsis(): ?string
    {
        return $this->Synopsis;
    }

    public function setSynopsis(?string $Synopsis): self
    {
        $this->Synopsis = $Synopsis;

        return $this;
    }

    public function getCoproduction(): ?string
    {
        return $this->Coproduction;
    }

    public function setCoproduction(?string $Coproduction): self
    {
        $this->Coproduction = $Coproduction;

        return $this;
    }

    public function getSoutiens(): ?string
    {
        return $this->Soutiens;
    }

    public function setSoutiens(?string $Soutiens): self
    {
        $this->Soutiens = $Soutiens;

        return $this;
    }

    public function getDistribution(): ?string
    {
        return $this->Distribution;
    }

    public function setDistribution(?string $Distribution): self
    {
        $this->Distribution = $Distribution;

        return $this;
    }

    public function getDiffusion(): ?string
    {
        return $this->Diffusion;
    }

    public function setDiffusion(?string $Diffusion): self
    {
        $this->Diffusion = $Diffusion;

        return $this;
    }

    public function getSélections(): ?string
    {
        return $this->Sélections;
    }

    public function setSélections(?string $Sélections): self
    {
        $this->Sélections = $Sélections;

        return $this;
    }

    public function getAvec(): ?string
    {
        return $this->Avec;
    }

    public function setAvec(?string $Avec): self
    {
        $this->Avec = $Avec;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->Image;
    }

    public function setImage(?string $Image): self
    {
        $this->Image = $Image;

        return $this;
    }

    public function getSon(): ?string
    {
        return $this->Son;
    }

    public function setSon(?string $Son): self
    {
        $this->Son = $Son;

        return $this;
    }

    public function getMontage(): ?string
    {
        return $this->Montage;
    }

    public function setMontage(?string $Montage): self
    {
        $this->Montage = $Montage;

        return $this;
    }

    public function getMusique(): ?string
    {
        return $this->Musique;
    }

    public function setMusique(?string $Musique): self
    {
        $this->Musique = $Musique;

        return $this;
    }

    public function getDirection(): ?string
    {
        return $this->Direction;
    }

    public function setDirection(?string $Direction): self
    {
        $this->Direction = $Direction;

        return $this;
    }

    public function getRégie(): ?string
    {
        return $this->Régie;
    }

    public function setRégie(?string $Régie): self
    {
        $this->Régie = $Régie;

        return $this;
    }

    public function getDécors(): ?string
    {
        return $this->Décors;
    }

    public function setDécors(?string $Décors): self
    {
        $this->Décors = $Décors;

        return $this;
    }

    public function getCostumes(): ?string
    {
        return $this->Costumes;
    }

    public function setCostumes(?string $Costumes): self
    {
        $this->Costumes = $Costumes;

        return $this;
    }

    public function getEtalonnage(): ?string
    {
        return $this->Etalonnage;
    }

    public function setEtalonnage(?string $Etalonnage): self
    {
        $this->Etalonnage = $Etalonnage;

        return $this;
    }

    public function getFormats(): ?Formats
    {
        return $this->Formats;
    }

    public function setFormats(?Formats $Formats): self
    {
        $this->Formats = $Formats;

        return $this;
    }
}
