<?php

namespace App\Entity;

use App\Repository\ImageRepository;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=ImageRepository::class)
 * @Vich\Uploadable
 */
class Image
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @var string|null
     */
    private $filename;

    /**
     * @var File|null
     * @Vich\UploadableField(mapping="image", fileNameProperty="filename")
     * @Assert\Image(
     *     mimeTypes= {"image/jpg", "image/jpeg", "image/png", "image/webp"},
     *     mimeTypesMessage = "JPG, JPEG, PNG or WEBP accepted"
     * )
     */
    private ?File $file;

    /**
     * @ORM\Column(type="datetime")
     * @var DateTimeInterface|null
     */
    private $updatedAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFilename(): ?string
    {
        return $this->filename;
    }

    public function setFilename($filename): self
    {
        $this->filename = $filename;

        return $this;
    }

    public function getFile(): File
    {
        return $this->file;
    }

    public function setFile(?File $file = null): void
    {
        $this->file = $file;

        // Only change the updated af if the file is really uploaded to avoid database updates.
        // This is needed when the file should be set when loading the entity.
        if ($this->file instanceof UploadedFile) {
            $this->updatedAt = new \DateTime('now');
        }
    }

    public function getUpdatedAt(): ?DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function __toString(): string
    {
        return $this->filename;
    }
}
