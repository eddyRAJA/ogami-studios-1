<?php

namespace App\Entity;

use App\Repository\TeamRepository;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity(repositoryClass=TeamRepository::class)
 * @Vich\Uploadable
 */
class Team
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
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $jobTitle;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $avatar;

    /**
     * @Vich\UploadableField(mapping="about_picture_file", fileNameProperty="avatar")
     * @Assert\File(
     *  maxSize = "1M",
     *  mimeTypes = {"image/jpeg", "image/png", "image/webp"},
     *  mimeTypesMessage = "Please upload a valid Format, jpeg, png, webp"
     * )
     * @var File
     */
    private $avatarFile;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $phoneNumber;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $facebookLink;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $linkedinLink;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $twiterLink;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $instaLink;

    /**
     * @Gedmo\Slug(fields={"firstname"})
     * @ORM\Column(type="string", length=255)
     * 
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

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getJobTitle(): ?string
    {
        return $this->jobTitle;
    }

    public function setJobTitle(string $jobTitle): self
    {
        $this->jobTitle = $jobTitle;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getAvatar(): ?string
    {
        return $this->avatar;
    }

    public function setAvatar(?string $avatar): self
    {
        $this->avatar = $avatar;

        return $this;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(?string $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    public function getFacebookLink(): ?string
    {
        return $this->facebookLink;
    }

    public function setFacebookLink(string $facebookLink): self
    {
        $this->facebookLink = $facebookLink;

        return $this;
    }

    public function getLinkedinLink(): ?string
    {
        return $this->linkedinLink;
    }

    public function setLinkedinLink(string $linkedinLink): self
    {
        $this->linkedinLink = $linkedinLink;

        return $this;
    }

    public function getTwiterLink(): ?string
    {
        return $this->twiterLink;
    }

    public function setTwiterLink(string $twiterLink): self
    {
        $this->twiterLink = $twiterLink;

        return $this;
    }

    public function getInstaLink(): ?string
    {
        return $this->instaLink;
    }

    public function setInstaLink(string $instaLink): self
    {
        $this->instaLink = $instaLink;

        return $this;
    }

    public function setAvatarFile(File $avatarFile): Team
    {
        $this->avatarFile = $avatarFile;
        
        return $this;
    }
    
    public function getAvatarFile(): ?File
    {
        return $this->avatarFile;
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
