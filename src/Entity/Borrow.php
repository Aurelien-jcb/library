<?php

namespace App\Entity;

use App\Repository\BorrowRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BorrowRepository::class)
 */
class Borrow
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $borrowDate;

    /**
     * @ORM\Column(type="date")
     */
    private $backDate;

    /**
     * @ORM\ManyToMany(targetEntity=Book::class, inversedBy="books")
     */
    private $book;

    /**
     * @ORM\OneToMany(targetEntity=Borrower::class, mappedBy="borrowers")
     */
    private $borrowers;

    public function __construct()
    {
        $this->borrowers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBorrowDate(): ?\DateTimeInterface
    {
        return $this->borrowDate;
    }

    public function setBorrowDate(\DateTimeInterface $borrowDate): self
    {
        $this->borrowDate = $borrowDate;

        return $this;
    }

    public function getBackDate(): ?\DateTimeInterface
    {
        return $this->backDate;
    }

    public function setBackDate(\DateTimeInterface $backDate): self
    {
        $this->backDate = $backDate;

        return $this;
    }

    public function getBook(): ?Book
    {
        return $this->book;
    }

    public function setBook(?Book $book): self
    {
        $this->book = $book;

        return $this;
    }

    /**
     * @return Collection|Borrower[]
     */
    public function getBorrowers(): Collection
    {
        return $this->borrowers;
    }

    public function addBorrower(Borrower $borrower): self
    {
        if (!$this->borrowers->contains($borrower)) {
            $this->borrowers[] = $borrower;
            $borrower->addBorrower($this);
        }

        return $this;
    }

    public function removeBorrower(Borrower $borrower): self
    {
        if ($this->borrowers->removeElement($borrower)) {
            $borrower->removeBorrower($this);
        }

        return $this;
    }
}
