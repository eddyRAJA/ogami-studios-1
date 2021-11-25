<?php

namespace App\Entity;

use App\Repository\GalleryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity(repositoryClass=GalleryRepository::class)
 */
class Gallery
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
    private $title;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity=Illustration::class, mappedBy="gallery")
     */
    private $illustrations;


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
     * @Gedmo\Slug(fields={"title"})
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

    /**
     * @ORM\OneToOne(targetEntity=Studio::class, mappedBy="gallery", cascade={"persist", "remove"})
     */
    private $studio;

    /**
     * @ORM\OneToOne(targetEntity=Equipment::class, mappedBy="gallery", cascade={"persist", "remove"})
     */
    private $equipment;

    /**
     * @ORM\OneToOne(targetEntity=Team::class, mappedBy="gallery", cascade={"persist", "remove"})
     */
    private $team;


    public function __construct()
    {
        $this->illustrations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

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

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updated_at;
    }


    /**
     * @return Collection|Illustration[]
     */
    public function getIllustrations(): Collection
    {
        return $this->illustrations;
    }

    public function addIllustration(Illustration $illustration): self
    {
        if (!$this->illustrations->contains($illustration)) {
            $this->illustrations[] = $illustration;
            $illustration->setGallery($this);
        }

        return $this;
    }

    public function removeIllustration(Illustration $illustration): self
    {
        if ($this->illustrations->removeElement($illustration)) {
            // set the owning side to null (unless already changed)
            if ($illustration->getGallery() === $this) {
                $illustration->setGallery(null);
            }
        }

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function getStudio(): ?Studio
    {
        return $this->studio;
    }

    public function setStudio(?Studio $studio): self
    {
        // unset the owning side of the relation if necessary
        if ($studio === null && $this->studio !== null) {
            $this->studio->setGallery(null);
        }

        // set the owning side of the relation if necessary
        if ($studio !== null && $studio->getGallery() !== $this) {
            $studio->setGallery($this);
        }

        $this->studio = $studio;

        return $this;
    }

    public function getEquipment(): ?Equipment
    {
        return $this->equipment;
    }

    public function setEquipment(?Equipment $equipment): self
    {
        // unset the owning side of the relation if necessary
        if ($equipment === null && $this->equipment !== null) {
            $this->equipment->setGallery(null);
        }

        // set the owning side of the relation if necessary
        if ($equipment !== null && $equipment->getGallery() !== $this) {
            $equipment->setGallery($this);
        }

        $this->equipment = $equipment;

        return $this;
    }

    public function getTeam(): ?Team
    {
        return $this->team;
    }

    public function setTeam(?Team $team): self
    {
        // unset the owning side of the relation if necessary
        if ($team === null && $this->team !== null) {
            $this->team->setGallery(null);
        }

        // set the owning side of the relation if necessary
        if ($team !== null && $team->getGallery() !== $this) {
            $team->setGallery($this);
        }

        $this->team = $team;

        return $this;
    }

}
