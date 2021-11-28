<?php

namespace App\Entity;

use App\Repository\ArticleBlogRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=ArticleBlogRepository::class)
 * @Vich\Uploadable
 */
class ArticleBlog
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
     * @ORM\Column(type="string", length=255)
     */
    private $subject;

    /**
     * @ORM\Column(type="text")
     */
    private $content;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $illustration;

    /**
     * @Vich\UploadableField(mapping="illustration_file", fileNameProperty="illustration")
     * @Assert\File(
     *  maxSize = "1M",
     *  mimeTypes = {"image/jpeg", "image/png", "image/webp"},
     *  mimeTypesMessage = "Please upload a valid Format, jpeg, png, webp"
     * )
     * @var File
     */
    private $illustrationFile;

    /**
     * @ORM\ManyToOne(targetEntity=ArticleBlogCategory::class, inversedBy="articleBlogs")
     */
    private $category;

    /**
     * @ORM\OneToMany(targetEntity=User::class, mappedBy="articleBlog")
     */
    private $author;

    /**
     * @Gedmo\Slug(fields={"title"})
     * 
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

    public function __construct()
    {
        $this->author = new ArrayCollection();
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

    public function getSubject(): ?string
    {
        return $this->subject;
    }

    public function setSubject(string $subject): self
    {
        $this->subject = $subject;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getIllustration(): ?string
    {
        return $this->illustration;
    }

    public function setIllustration(string $illustration): self
    {
        $this->illustration = $illustration;

        return $this;
    }

    public function getCategory(): ?ArticleBlogCategory
    {
        return $this->category;
    }

    public function setCategory(?ArticleBlogCategory $category): self
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getAuthor(): Collection
    {
        return $this->author;
    }

    public function addAuthor(User $author): self
    {
        if (!$this->author->contains($author)) {
            $this->author[] = $author;
            $author->setArticleBlog($this);
        }

        return $this;
    }

    public function removeAuthor(User $author): self
    {
        if ($this->author->removeElement($author)) {
            // set the owning side to null (unless already changed)
            if ($author->getArticleBlog() === $this) {
                $author->setArticleBlog(null);
            }
        }

        return $this;
    }

    
    public function setIllustrationFile(File $illustrationFile): ArticleBlog
    {
        $this->illustrationFile = $illustrationFile;
        
        return $this;
    }
    
    
    public function getIllustrationFile(): ?File
    {
        return $this->illustrationFile;
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
