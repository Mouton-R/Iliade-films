<?php

namespace App\Entity;

use App\Entity\Trait\SlugTrait;
use App\Repository\FilmsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FilmsRepository::class)]
class Films
{
    use SlugTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 400)]
    private ?string $Titre = null;

    #[ORM\Column(length: 400)]
    private ?string $Realisation = null;

    #[ORM\Column(length: 400)]
    private ?string $Scenario = null;

    #[ORM\Column(nullable: true)]
    private ?int $Annee = null;

    #[ORM\Column(nullable: true)]
    private ?int $Duree = null;

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
    private ?string $Selections = null;

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
    private ?string $Regie = null;

    #[ORM\Column(length: 400, nullable: true)]
    private ?string $Decors = null;

    #[ORM\Column(length: 400, nullable: true)]
    private ?string $Costumes = null;

    #[ORM\Column(length: 400, nullable: true)]
    private ?string $Etalonnage = null;

    #[ORM\ManyToOne(inversedBy: 'films')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Formats $formats = null;

    #[ORM\OneToMany(mappedBy: 'films', targetEntity: Images::class, orphanRemoval: true, cascade: ['persist'])]
    private Collection $images;

    public function __construct()
    {
        $this->images = new ArrayCollection();
    }



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

    public function getRealisation(): ?string
    {
        return $this->Realisation;
    }

    public function setRealisation(string $Realisation): self
    {
        $this->Realisation = $Realisation;

        return $this;
    }

    public function getScenario(): ?string
    {
        return $this->Scenario;
    }

    public function setScenario(string $Scenario): self
    {
        $this->Scenario = $Scenario;

        return $this;
    }

    public function getAnnee(): ?int
    {
        return $this->Annee;
    }

    public function setAnnee(?int $Annee): self
    {
        $this->Annee = $Annee;

        return $this;
    }

    public function getDuree(): ?int
    {
        return $this->Duree;
    }

    public function setDuree(?int $Duree): self
    {
        $this->Duree = $Duree;

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

    public function getSelections(): ?string
    {
        return $this->Selections;
    }

    public function setSelections(?string $Selections): self
    {
        $this->Selections = $Selections;

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

    public function getRegie(): ?string
    {
        return $this->Regie;
    }

    public function setRegie(?string $Regie): self
    {
        $this->Regie = $Regie;

        return $this;
    }

    public function getDecors(): ?string
    {
        return $this->Decors;
    }

    public function setDecors(?string $Decors): self
    {
        $this->Decors = $Decors;

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
        return $this->formats;
    }

    public function setFormats(?Formats $formats): self
    {
        $this->formats = $formats;

        return $this;
    }

    /**
     * @return Collection<int, Images>
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(Images $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images->add($image);
            $image->setFilms($this);
        }

        return $this;
    }

    public function removeImage(Images $image): self
    {
        if ($this->images->removeElement($image)) {
            // set the owning side to null (unless already changed)
            if ($image->getFilms() === $this) {
                $image->setFilms(null);
            }
        }

        return $this;
    }
}
