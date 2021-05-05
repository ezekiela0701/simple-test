<?php

namespace App\Entity;

use App\Repository\CircularRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CircularRepository::class)
 */
class Circular
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
    private $classschool;

    /**
     * @ORM\OneToOne(targetEntity=ClassSchool::class, inversedBy="circular", cascade={"persist", "remove"})
     */
    private $schoolclass;

    /**
     * @ORM\OneToMany(targetEntity=Note::class, mappedBy="circular")
     */
    private $notes;

    public function __construct()
    {
        $this->notes = new ArrayCollection();
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

    public function getClassschool(): ?string
    {
        return $this->classschool;
    }

    public function setClassschool(string $classschool): self
    {
        $this->classschool = $classschool;

        return $this;
    }

    public function getSchoolclass(): ?ClassSchool
    {
        return $this->schoolclass;
    }

    public function setSchoolclass(?ClassSchool $schoolclass): self
    {
        $this->schoolclass = $schoolclass;

        return $this;
    }

    /**
     * @return Collection|Note[]
     */
    public function getNotes(): Collection
    {
        return $this->notes;
    }

    public function addNote(Note $note): self
    {
        if (!$this->notes->contains($note)) {
            $this->notes[] = $note;
            $note->setCircular($this);
        }

        return $this;
    }

    public function removeNote(Note $note): self
    {
        if ($this->notes->removeElement($note)) {
            // set the owning side to null (unless already changed)
            if ($note->getCircular() === $this) {
                $note->setCircular(null);
            }
        }

        return $this;
    }
}
