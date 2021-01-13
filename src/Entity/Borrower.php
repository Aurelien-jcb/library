<?php

namespace App\Entity;

use App\Repository\BorrowerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BorrowerRepository::class)
 */
class Borrower
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
    private $name;

    /**
     * @ORM\Column(type="string", length=190)
     */
    private $mail;

    /**
     * @ORM\Column(type="integer")
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=190, nullable=true)
     */
    private $login;

    /**
     * @ORM\Column(type="string", length=190, nullable=true)
     */
    private $password;

    /**
     * @ORM\Column(type="boolean")
     */
    private $flag;

    /**
     * @ORM\Column(type="boolean")
     */
    private $card;

    /**
     * @ORM\ManyToOne(targetEntity=Borrow::class, inversedBy="borrowers")
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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getPhone(): ?int
    {
        return $this->phone;
    }

    public function setPhone(int $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getLogin(): ?string
    {
        return $this->login;
    }

    public function setLogin(?string $login): self
    {
        $this->login = $login;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getFlag(): ?bool
    {
        return $this->flag;
    }

    public function setFlag(bool $flag): self
    {
        $this->flag = $flag;

        return $this;
    }

    public function getCard(): ?bool
    {
        return $this->card;
    }

    public function setCard(bool $card): self
    {
        $this->card = $card;

        return $this;
    }

    /**
     * @return Collection|Borrow[]
     */
    public function getBorrowers(): Collection
    {
        return $this->borrowers;
    }

    public function addBorrower(Borrow $borrower): self
    {
        if (!$this->borrowers->contains($borrower)) {
            $this->borrowers[] = $borrower;
        }

        return $this;
    }

    public function removeBorrower(Borrow $borrower): self
    {
        $this->borrowers->removeElement($borrower);

        return $this;
    }
}
