<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity(repositoryClass=IllustrationRepository::class)
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
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $url;
    
    /**
     * @ORM\ManyToOne(targetEntity=Gallery::class, inversedBy="illustrations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $gallery;

    /**
     * @ORM\OneToOne(targetEntity=Studio::class, mappedBy="main_picture", cascade={"persist", "remove"})
     */
    private $studio_front;

    /**
     * @ORM\OneToOne(targetEntity=Studio::class, mappedBy="back_illustration", cascade={"persist", "remove"})
     */
    private $back_studio;

    /**
     * @ORM\OneToOne(targetEntity=Studio::class, mappedBy="inside_picture", cascade={"persist", "remove"})
     */
    private $inside_studio;

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

    /**
     * @ORM\OneToOne(targetEntity=Equipment::class, mappedBy="main_picture", cascade={"persist", "remove"})
     */
    private $equipment_main;

    /**
     * @ORM\OneToOne(targetEntity=Equipment::class, mappedBy="second_picture", cascade={"persist", "remove"})
     */
    private $equipment_second;

    /**
     * @ORM\OneToOne(targetEntity=Team::class, mappedBy="image_profil", cascade={"persist", "remove"})
     */
    private $team;

    /**
     * @ORM\OneToOne(targetEntity=News::class, mappedBy="illustration", cascade={"persist", "remove"})
     */
    private $news;



    public function __construct()
    {
        $this->studios = new ArrayCollection();
    }


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

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

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

    public function getStudioFront(): ?Studio
    {
        return $this->studio_front;
    }

    public function setStudioFront(?Studio $studio_front): self
    {
        // unset the owning side of the relation if necessary
        if ($studio_front === null && $this->studio_front !== null) {
            $this->studio_front->setMainPicture(null);
        }

        // set the owning side of the relation if necessary
        if ($studio_front !== null && $studio_front->getMainPicture() !== $this) {
            $studio_front->setMainPicture($this);
        }

        $this->studio_front = $studio_front;

        return $this;
    }

    public function getBackStudio(): ?Studio
    {
        return $this->back_studio;
    }

    public function setBackStudio(?Studio $back_studio): self
    {
        // unset the owning side of the relation if necessary
        if ($back_studio === null && $this->back_studio !== null) {
            $this->back_studio->setBackIllustration(null);
        }

        // set the owning side of the relation if necessary
        if ($back_studio !== null && $back_studio->getBackIllustration() !== $this) {
            $back_studio->setBackIllustration($this);
        }

        $this->back_studio = $back_studio;

        return $this;
    }

    public function getInsideStudio(): ?Studio
    {
        return $this->inside_studio;
    }

    public function setInsideStudio(?Studio $inside_studio): self
    {
        // unset the owning side of the relation if necessary
        if ($inside_studio === null && $this->inside_studio !== null) {
            $this->inside_studio->setInsidePicture(null);
        }

        // set the owning side of the relation if necessary
        if ($inside_studio !== null && $inside_studio->getInsidePicture() !== $this) {
            $inside_studio->setInsidePicture($this);
        }

        $this->inside_studio = $inside_studio;

        return $this;
    }

    public function getEquipmentMain(): ?Equipment
    {
        return $this->equipment_main;
    }

    public function setEquipmentMain(?Equipment $equipment_main): self
    {
        // unset the owning side of the relation if necessary
        if ($equipment_main === null && $this->equipment_main !== null) {
            $this->equipment_main->setMainPicture(null);
        }

        // set the owning side of the relation if necessary
        if ($equipment_main !== null && $equipment_main->getMainPicture() !== $this) {
            $equipment_main->setMainPicture($this);
        }

        $this->equipment_main = $equipment_main;

        return $this;
    }

    public function getEquipmentSecond(): ?Equipment
    {
        return $this->equipment_second;
    }

    public function setEquipmentSecond(?Equipment $equipment_second): self
    {
        // unset the owning side of the relation if necessary
        if ($equipment_second === null && $this->equipment_second !== null) {
            $this->equipment_second->setSecondPicture(null);
        }

        // set the owning side of the relation if necessary
        if ($equipment_second !== null && $equipment_second->getSecondPicture() !== $this) {
            $equipment_second->setSecondPicture($this);
        }

        $this->equipment_second = $equipment_second;

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
            $this->team->setImageProfil(null);
        }

        // set the owning side of the relation if necessary
        if ($team !== null && $team->getImageProfil() !== $this) {
            $team->setImageProfil($this);
        }

        $this->team = $team;

        return $this;
    }

    public function getNews(): ?News
    {
        return $this->news;
    }

    public function setNews(?News $news): self
    {
        // unset the owning side of the relation if necessary
        if ($news === null && $this->news !== null) {
            $this->news->setIllustration(null);
        }

        // set the owning side of the relation if necessary
        if ($news !== null && $news->getIllustration() !== $this) {
            $news->setIllustration($this);
        }

        $this->news = $news;

        return $this;
    }
}
