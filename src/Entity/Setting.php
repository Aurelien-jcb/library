<?php

namespace App\Entity;

use App\Repository\SettingRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SettingRepository::class)
 */
class Setting
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
    private $borrowDuration;

    /**
     * @ORM\Column(type="integer")
     */
    private $numberOfbooks;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $latePenality;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBorrowDuration(): ?string
    {
        return $this->borrowDuration;
    }

    public function setBorrowDuration(string $borrowDuration): self
    {
        $this->borrowDuration = $borrowDuration;

        return $this;
    }

    public function getNumberOfbooks(): ?int
    {
        return $this->numberOfbooks;
    }

    public function setNumberOfbooks(int $numberOfbooks): self
    {
        $this->numberOfbooks = $numberOfbooks;

        return $this;
    }

    public function getLatePenality(): ?float
    {
        return $this->latePenality;
    }

    public function setLatePenality(?float $latePenality): self
    {
        $this->latePenality = $latePenality;

        return $this;
    }
}
