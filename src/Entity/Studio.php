<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use App\Repository\StudioRepository;
use Doctrine\Common\Collections\Collection;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Gedmo\Mapping\Annotation as Gedmo;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=StudioRepository::class)
 * 
 * 
 */
class Studio
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
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    private $studioFrontPicture;

    /**
     * @Vich\UploadableField(mapping="illustration_file", fileNameProperty="studioFrontPicture")
     * @Assert\File(
     *  maxSize = "1M",
     *  mimeTypes = {"image/jpeg", "image/png", "image/webp"},
     *  mimeTypesMessage = "Please upload a valid Format, jpeg, png, webp"
     * )
     * @var File
     */
    private $studioFrontPictureFile;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $studioIndoorPicture;

    /**
     * @Vich\UploadableField(mapping="illustration_file", fileNameProperty="studioIndoorPicture")
     * @Assert\File(
     *  maxSize = "1M",
     *  mimeTypes = {"image/jpeg", "image/png", "image/webp"},
     *  mimeTypesMessage = "Please upload a valid Format, jpeg, png, webp"
     * )
     * @var File
     */
    private $studioIndoorPictureFile;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $studioBackgroundPicture;

    /**
     * @Vich\UploadableField(mapping="illustration_file", fileNameProperty="studioBackgroundPicture")
     * @Assert\File(
     *  maxSize = "1M",
     *  mimeTypes = {"image/jpeg", "image/png", "image/webp"},
     *  mimeTypesMessage = "Please upload a valid Format, jpeg, png, webp"
     * )
     * @var File
     */
    private $studioBackgroundPictureFile;

    /**
     * @Gedmo\Slug(fields={"name"})
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

    /**
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime")
     */
    private $updated_at;


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


    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }


    public function getStudioBackgroundPicture(): ?string
    {
        return $this->studioBackgroundPicture;
    }

    public function setStudioBackgroundPicture(string $studioBackgroundPicture): self
    {
        $this->studioBackgroundPicture = $studioBackgroundPicture;

        return $this;
    }

    public function getStudioFrontPicture(): ?string
    {
        return $this->studioFrontPicture;
    }

    public function setStudioFrontPicture(string $studioFrontPicture): self
    {
        $this->studioFrontPicture = $studioFrontPicture;

        return $this;
    }

    public function getStudioIndoorPicture(): ?string
    {
        return $this->studioIndoorPicture;
    }

    public function setStudioIndoorPicture(?string $studioIndoorPicture): self
    {
        $this->studioIndoorPicture = $studioIndoorPicture;

        return $this;
    }

    public function getStudioFrontPictureFile(): File
    {
        return $this->studioFrontPictureFile;
    }

    public function setStudioFrontPictureFile(File $studioFrontPictureFile): Studio
    {
        $this->studioFrontPictureFile = $studioFrontPictureFile;

        return $this;
    }

    public function getStudioIndoorPictureFile(): File
    {
        return $this->studioIndoorPictureFile;
    }

    public function setStudioIndoorPictureFile(File $studioIndoorPictureFile): Studio
    {
        $this->studioIndoorPictureFile = $studioIndoorPictureFile;

        return $this;
    }
    
    public function setStudioBackgroundPictureFile(File $studioBackgroundPictureFile): Studio
    {
        $this->studioBackgroundPictureFile = $studioBackgroundPictureFile;

        return $this;
    }
    public function getStudioBackgroundPictureFile(): ?File
    {
        return $this->studioBackgroundPictureFile;
    }


    public function getSlug(): ?string
    {
        return $this->slug;
    }


    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updated_at;
    }
}
