<?php

namespace App\Entity;

use App\Repository\BandRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BandRepository::class)
 */
class Band
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="blob", nullable=true)
     */
    private $picture;

    /**
     * @ORM\ManyToMany(targetEntity=artist::class, inversedBy="bands")
     */
    private $artists;


    /**
     * @ORM\ManyToMany(targetEntity=style::class)
     */
    private $styles;

    /**
     * @ORM\OneToMany(targetEntity=Participate::class, mappedBy="band", orphanRemoval=true)
     */
    private $participates;


    public function __construct()
    {
        $this->artists = new ArrayCollection();
        $this->styles = new ArrayCollection();
        $this->participates = new ArrayCollection();
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

    public function getPicture()
    {
        return $this->picture;
    }

    public function setPicture($picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * @return Collection|artist[]
     */
    public function getArtists(): Collection
    {
        return $this->artists;
    }

    public function addArtist(artist $artist): self
    {
        if (!$this->artists->contains($artist)) {
            $this->artists[] = $artist;
        }

        return $this;
    }

    public function removeArtist(artist $artist): self
    {
        $this->artists->removeElement($artist);

        return $this;
    }

    /**
     * @return Collection|style[]
     */
    public function getStyles(): Collection
    {
        return $this->styles;
    }

    public function addStyle(style $style): self
    {
        if (!$this->styles->contains($style)) {
            $this->styles[] = $style;
        }

        return $this;
    }

    public function removeStyle(style $style): self
    {
        $this->styles->removeElement($style);

        return $this;
    }

    /**
     * @return Collection|Participate[]
     */
    public function getParticipates(): Collection
    {
        return $this->participates;
    }

    public function addParticipate(Participate $participate): self
    {
        if (!$this->participates->contains($participate)) {
            $this->participates[] = $participate;
            $participate->setBand($this);
        }

        return $this;
    }

    public function removeParticipate(Participate $participate): self
    {
        if ($this->participates->removeElement($participate)) {
            // set the owning side to null (unless already changed)
            if ($participate->getBand() === $this) {
                $participate->setBand(null);
            }
        }

        return $this;
    }
}
