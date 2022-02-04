<?php

namespace App\Entity;

use App\Repository\ArtistRepository;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;
use JetBrains\PhpStorm\Pure;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=ArtistRepository::class)
 * @UniqueEntity("stageName")
 * @Vich\Uploadable()
 */
class Artist
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
    private $stageName;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lastName;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $role;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     * @Assert\Range(min=0, max=2)
     */
    private $gender;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $birthDay;

    /**
     * @ORM\OneToOne(targetEntity=Image::class, cascade={"persist", "remove"}, orphanRemoval=true)
     * @ORM\JoinColumn(nullable=true)
     */
    private ?Image $picture;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStageName(): ?string
    {
        return $this->stageName;
    }

    public function setStageName(string $StageName): self
    {
        $this->stageName = $StageName;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(?string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(?string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(?string $role): self
    {
        $this->role = $role;

        return $this;
    }


    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(?string $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    public function getBirthDay(): ?DateTimeInterface
    {
        return $this->birthDay;
    }

    public function setBirthDay(?DateTimeInterface $birthDay): self
    {
        $this->birthDay = $birthDay;

        return $this;
    }

    #[Pure] public function __toString()
    {
        return $this->getStageName();
    }

    public function getPicture(): ?Image
    {
        return $this->picture;
    }

    public function setPicture(Image $picture): self
    {
        $this->picture = $picture;

        return $this;
    }
}
