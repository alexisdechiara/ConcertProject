<?php

namespace App\Entity;

use App\Repository\ParticipateRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ParticipateRepository::class)
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
     * @ORM\ManyToOne(targetEntity=concert::class, inversedBy="participates")
     * @ORM\JoinColumn(nullable=false)
     */
    private $concert;

    /**
     * @ORM\ManyToOne(targetEntity=band::class, inversedBy="participates")
     * @ORM\JoinColumn(nullable=false)
     */
    private $band;

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
}
