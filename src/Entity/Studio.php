<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity(repositoryClass=StudioRepository::class)
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

    /**
     * @ORM\OneToOne(targetEntity=Illustration::class, inversedBy="studio_front", cascade={"persist", "remove"})
     */
    private $main_picture;

    /**
     * @ORM\OneToOne(targetEntity=Illustration::class, inversedBy="inside_studio", cascade={"persist", "remove"})
     */
    private $inside_picture;
    
    /**
     * @ORM\OneToOne(targetEntity=Illustration::class, inversedBy="back_studio", cascade={"persist", "remove"})
     */
    private $back_illustration;

    /**
     * @ORM\OneToOne(targetEntity=Gallery::class, inversedBy="studio", cascade={"persist", "remove"})
     */
    private $gallery;


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

    public function getMainPicture(): ?Illustration
    {
        return $this->main_picture;
    }

    public function setMainPicture(?Illustration $main_picture): self
    {
        $this->main_picture = $main_picture;

        return $this;
    }

   

    public function getBackIllustration(): ?Illustration
    {
        return $this->back_illustration;
    }

    public function setBackIllustration(?Illustration $back_illustration): self
    {
        $this->back_illustration = $back_illustration;

        return $this;
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

    public function getInsidePicture(): ?Illustration
    {
        return $this->inside_picture;
    }

    public function setInsidePicture(?Illustration $inside_picture): self
    {
        $this->inside_picture = $inside_picture;

        return $this;
    }

}
