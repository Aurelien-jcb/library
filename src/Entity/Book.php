<?php

namespace App\Entity;

use App\Repository\BookRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BookRepository::class)
 */
class Book
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=190)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=190)
     */
    private $category;

    /**
     * @ORM\Column(type="string", length=190)
     */
    private $language;

    /**
     * @ORM\Column(type="string", length=190)
     */
    private $author;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $numberPage;

    /**
     * @ORM\Column(type="string", length=190, nullable=true)
     */
    private $editor;

    /**
     * @ORM\Column(type="integer")
     */
    private $bookIsbn;

    /**
     * @ORM\Column(type="string", length=190, nullable=true)
     */
    private $state;

    /**
     * @ORM\ManyToMany(targetEntity=Borrow::class, mappedBy="book")
     */
    private $books;

    public function __construct()
    {
        $this->books = new ArrayCollection();
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

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getLanguage(): ?string
    {
        return $this->language;
    }

    public function setLanguage(string $language): self
    {
        $this->language = $language;

        return $this;
    }

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(string $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getNumberPage(): ?int
    {
        return $this->numberPage;
    }

    public function setNumberPage(?int $numberPage): self
    {
        $this->numberPage = $numberPage;

        return $this;
    }

    public function getEditor(): ?string
    {
        return $this->editor;
    }

    public function setEditor(?string $editor): self
    {
        $this->editor = $editor;

        return $this;
    }

    public function getBookIsbn(): ?int
    {
        return $this->bookIsbn;
    }

    public function setBookIsbn(int $bookIsbn): self
    {
        $this->bookIsbn = $bookIsbn;

        return $this;
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    public function setState(?string $state): self
    {
        $this->state = $state;

        return $this;
    }

    /**
     * @return Collection|Borrow[]
     */
    public function getBooks(): Collection
    {
        return $this->books;
    }

    public function addBook(Borrow $book): self
    {
        if (!$this->books->contains($book)) {
            $this->books[] = $book;
            $book->setBook($this);
        }

        return $this;
    }

    public function removeBook(Borrow $book): self
    {
        if ($this->books->removeElement($book)) {
            // set the owning side to null (unless already changed)
            if ($book->getBook() === $this) {
                $book->setBook(null);
            }
        }

        return $this;
    }
}
