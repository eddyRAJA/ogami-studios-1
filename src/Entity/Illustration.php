<?php

namespace App\Entity;

use App\Repository\IllustrationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=IllustrationRepository::class)
 * @Vich\Uploadable
 */
class Illustration
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
     * @ORM\Column(length=255)
     * @var string|null
     */
    private $illustration;

    /**
     * @Vich\UploadableField(mapping="illustration_file", fileNameProperty="illustration")
     * @Assert\File(
     *  maxSize = "1M",
     *  mimeTypes = {"image/jpeg", "image/png", "image/webp"},
     *  mimeTypesMessage = "Please upload a valid Format, jpeg, png, webp"
     * )
     * @var File|null
     */
    private $illustrationFile;

    /**
     * @ORM\ManyToOne(targetEntity=Gallery::class, inversedBy="illustrations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $gallery;

    /**
     * 
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * 
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime")
     */
    private $updated_at;


    public function __toString()
    {
        return $this->name;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }
    
    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function setIllustrationFile(?File $illustrationFile = null): Void
    {
        
        $this->illustrationFile = $illustrationFile;
        if($illustrationFile)
        {
            $this->updated_at = new \DateTime();
        }
    }

    public function getIllustrationFile(): ?File
    {
        return $this->illustrationFile;
    }

    public function setIllustration(?string  $illustration): void
    {
        $this->illustration = $illustration;
    }

    public function getIllustration(): ?string
    {
        return $this->illustration;
    }

    public function getGallery(): ?Gallery
    {
        return $this->gallery;
    }

    public function setGallery(?Gallery $gallery): self
    {
        $this->gallery = $gallery;

        return $this;
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
