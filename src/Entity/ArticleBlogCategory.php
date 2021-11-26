<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity(repositoryClass=ArticleBlogCategoryRepository::class)
 */
class ArticleBlogCategory
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
     * @Gedmo\Slug(fields={"name"})
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

    /**
     * @ORM\OneToMany(targetEntity=ArticleBlog::class, mappedBy="category")
     */
    private $articleBlogs;

    public function __construct()
    {
        $this->articleBlogs = new ArrayCollection();
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

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    /**
     * @return Collection|ArticleBlog[]
     */
    public function getArticleBlogs(): Collection
    {
        return $this->articleBlogs;
    }

    public function addArticleBlog(ArticleBlog $articleBlog): self
    {
        if (!$this->articleBlogs->contains($articleBlog)) {
            $this->articleBlogs[] = $articleBlog;
            $articleBlog->setCategory($this);
        }

        return $this;
    }

    public function removeArticleBlog(ArticleBlog $articleBlog): self
    {
        if ($this->articleBlogs->removeElement($articleBlog)) {
            // set the owning side to null (unless already changed)
            if ($articleBlog->getCategory() === $this) {
                $articleBlog->setCategory(null);
            }
        }

        return $this;
    }
}
