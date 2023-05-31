<?php

namespace App\Entity;

use App\Entity\Trait\SlugTrait;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\FormatsRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity(repositoryClass: FormatsRepository::class)]
class Formats
{
    use SlugTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $name = null;


    #[ORM\Column(type: 'integer')]
    private $formatOrder;

    #[ORM\ManyToOne(targetEntity: self::class, inversedBy: 'formats')]
    #[ORM\JoinColumn(onDelete: 'CASCADE')]
    private ?self $parent = null;

    #[ORM\OneToMany(mappedBy: 'parent', targetEntity: self::class)]
    private Collection $formats;

    #[ORM\OneToMany(mappedBy: 'formats', targetEntity: Films::class)]
    private Collection $films;

    public function __construct()
    {
        $this->formats = new ArrayCollection();
        $this->films = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getParent(): ?self
    {
        return $this->parent;
    }

    public function setParent(?self $parent): self
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * @return Collection<int, self>
     */
    public function getFormats(): Collection
    {
        return $this->formats;
    }

    public function addFormat(self $format): self
    {
        if (!$this->formats->contains($format)) {
            $this->formats->add($format);
            $format->setParent($this);
        }

        return $this;
    }

    public function removeFormat(self $format): self
    {
        if ($this->formats->removeElement($format)) {
            // set the owning side to null (unless already changed)
            if ($format->getParent() === $this) {
                $format->setParent(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Films>
     */
    public function getFilms(): Collection
    {
        return $this->films;
    }

    public function addFilm(Films $film): self
    {
        if (!$this->films->contains($film)) {
            $this->films->add($film);
            $film->setFormats($this);
        }

        return $this;
    }

    public function removeFilm(Films $film): self
    {
        if ($this->films->removeElement($film)) {
            // set the owning side to null (unless already changed)
            if ($film->getFormats() === $this) {
                $film->setFormats(null);
            }
        }

        return $this;
    }

    /**
     * Get the value of formatOrder
     */
    public function getFormatOrder()
    {
        return $this->formatOrder;
    }

    /**
     * Set the value of formatOrder
     */
    public function setFormatOrder($formatOrder): self
    {
        $this->formatOrder = $formatOrder;

        return $this;
    }
}
