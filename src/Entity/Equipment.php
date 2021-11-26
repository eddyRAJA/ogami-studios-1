<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity(repositoryClass=EquipmentRepository::class)
 */
class Equipment
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
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\OneToOne(targetEntity=Illustration::class, inversedBy="equipment_main", cascade={"persist", "remove"})
     */
    private $main_picture;

    /**
     * @ORM\OneToOne(targetEntity=Illustration::class, inversedBy="equipment_second", cascade={"persist", "remove"})
     */
    private $second_picture;

    /**
     * @ORM\OneToOne(targetEntity=Gallery::class, inversedBy="equipment", cascade={"persist", "remove"})
     */
    private $gallery;

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
     * @ORM\ManyToOne(targetEntity=EquipmentCategory::class, inversedBy="equipment", cascade={"persist", "remove"})
     */
    private $category;

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

    public function getMainPicture(): ?Illustration
    {
        return $this->main_picture;
    }

    public function setMainPicture(?Illustration $main_picture): self
    {
        $this->main_picture = $main_picture;

        return $this;
    }

    public function getSecondPicture(): ?Illustration
    {
        return $this->second_picture;
    }

    public function setSecondPicture(?Illustration $second_picture): self
    {
        $this->second_picture = $second_picture;

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

    public function getCategory(): ?EquipmentCategory
    {
        return $this->category;
    }

    public function setCategory(?EquipmentCategory $category): self
    {
        $this->category = $category;

        return $this;
    }

}
