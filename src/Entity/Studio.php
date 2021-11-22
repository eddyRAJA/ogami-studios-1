<?php

namespace App\Entity;

use App\Repository\StudioRepository;
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
     * @ORM\Column(type="string", length=255)
     */
    private $imageFront;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $imageInside;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $imageBack;

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

    public function getImageFront(): ?string
    {
        return $this->imageFront;
    }

    public function setImageFront(string $imageFront): self
    {
        $this->imageFront = $imageFront;

        return $this;
    }

    public function getImageInside(): ?string
    {
        return $this->imageInside;
    }

    public function setImageInside(string $imageInside): self
    {
        $this->imageInside = $imageInside;

        return $this;
    }

    public function getImageBack(): ?string
    {
        return $this->imageBack;
    }

    public function setImageBack(string $imageBack): self
    {
        $this->imageBack = $imageBack;

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

}
