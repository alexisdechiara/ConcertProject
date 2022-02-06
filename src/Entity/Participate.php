<?php

namespace App\Entity;

use App\Repository\ParticipateRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass=ParticipateRepository::class)
 * @UniqueEntity(fields={"concert", "band"})
 */
class Participate
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="smallint", nullable=false)
     */
    private $runningPassage;

    /**
     * @ORM\ManyToOne(targetEntity=Concert::class, inversedBy="participates")
     * @ORM\JoinColumn(nullable=false)
     */
    private $concert;

    /**
     * @ORM\ManyToOne(targetEntity=Band::class, inversedBy="participates")
     * @ORM\JoinColumn(nullable=false)
     */
    private $band;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isMainBand;

    /**
     * @ORM\Column(type="dateinterval", nullable=true)
     */
    private $duration;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRunningPassage(): ?int
    {
        return $this->runningPassage;
    }

    public function setRunningPassage(int $runningPassage): self
    {
        $this->runningPassage = $runningPassage;

        return $this;
    }

    public function getConcert(): ?concert
    {
        return $this->concert;
    }

    public function setConcert(?concert $concert): self
    {
        $this->concert = $concert;

        return $this;
    }

    public function getBand(): ?band
    {
        return $this->band;
    }

    public function setBand(?band $band): self
    {
        $this->band = $band;

        return $this;
    }

    public function getIsMainBand(): ?bool
    {
        return $this->isMainBand;
    }

    public function setIsMainBand(bool $isMainBand): self
    {
        $this->isMainBand = $isMainBand;

        return $this;
    }

    public function getDuration(): ?\DateInterval
    {
        return $this->duration;
    }

    public function setDuration(?\DateInterval $duration): self
    {
        $this->duration = $duration;

        return $this;
    }
}
