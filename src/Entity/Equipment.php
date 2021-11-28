<?php

namespace App\Entity;

use App\Repository\EquipmentRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Gedmo\Mapping\Annotation as Gedmo;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;


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
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    private $equipMainPicture;

    /**
     * @Vich\UploadableField(mapping="illustration_file", fileNameProperty="equipMainPicture")
     * @Assert\File(
     *  maxSize = "1M",
     *  mimeTypes = {"image/jpeg", "image/png", "image/webp"},
     *  mimeTypesMessage = "Please upload a valid Format, jpeg, png, webp"
     * )
     * @var File
     */
    private $equipMainPictureFile;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $equipSecondpicture;

    /**
     * @Vich\UploadableField(mapping="illustration_file", fileNameProperty="equipSecondpicture")
     * @Assert\File(
     *  maxSize = "1M",
     *  mimeTypes = {"image/jpeg", "image/png", "image/webp"},
     *  mimeTypesMessage = "Please upload a valid Format, jpeg, png, webp"
     * )
     * @var File
     */
    private $equipSecondpictureFile;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $equipThirdPicture;

    /**
     * @Vich\UploadableField(mapping="illustration_file", fileNameProperty="equipThirdPicture")
     * @Assert\File(
     *  maxSize = "1M",
     *  mimeTypes = {"image/jpeg", "image/png", "image/webp"},
     *  mimeTypesMessage = "Please upload a valid Format, jpeg, png, webp"
     * )
     * @var File
     */
    private $equipThirdPictureFile;
    
    /**
     * @ORM\ManyToOne(targetEntity=EquipmentCategory::class, inversedBy="equipment")
     */
    private $category;
    
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

    public function getEquipMainPicture(): ?string
    {
        return $this->equipMainPicture;
    }

    public function setEquipMainPicture(string $equipMainPicture): self
    {
        $this->equipMainPicture = $equipMainPicture;

        return $this;
    }

    public function getEquipSecondpicture(): ?string
    {
        return $this->equipSecondpicture;
    }

    public function setEquipSecondpicture(?string $equipSecondpicture): self
    {
        $this->equipSecondpicture = $equipSecondpicture;

        return $this;
    }

    public function getEquipThirdPicture(): ?string
    {
        return $this->equipThirdPicture;
    }

    public function setEquipThirdPicture(?string $equipThirdPicture): self
    {
        $this->equipThirdPicture = $equipThirdPicture;

        return $this;
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

    public function setEquipMainPictureFile(File $equipMainPictureFile): Equipment
    {
        $this->equipMainPictureFile = $equipMainPictureFile;
        
        return $this;
    }
    
    public function getEquipMainPictureFile(): ?File
    {
        return $this->equipMainPictureFile;
    }

    public function setEquipSecondpictureFile(File $equipSecondpictureFile): Equipment
    {
        $this->equipSecondpictureFile = $equipSecondpictureFile;
        
        return $this;
    }
    
    public function getEquipSecondpictureFile(): ?File
    {
        return $this->equipSecondpictureFile;
    }

    public function setEquipThirdPictureFile(File $equipThirdPictureFile): Equipment
    {
        $this->equipThirdPictureFile = $equipThirdPictureFile;
        
        return $this;
    }

    public function getEquipThirdPictureFile(): File
    {
        return $this->equipThirdPictureFile;
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
