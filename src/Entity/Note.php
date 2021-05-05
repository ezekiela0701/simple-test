<?php

namespace App\Entity;

use App\Repository\NoteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=NoteRepository::class)
 */
class Note
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=Student::class, cascade={"persist", "remove"})
     */
    private $student;

    /**
     * @ORM\ManyToOne(targetEntity=Circular::class, inversedBy="notes")
     */
    private $circular;

    /**
     * @ORM\ManyToOne(targetEntity=Exam::class, inversedBy="notes")
     */
    private $exam;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStudent(): ?Student
    {
        return $this->student;
    }

    public function setStudent(?Student $student): self
    {
        $this->student = $student;

        return $this;
    }

    public function getCircular(): ?Circular
    {
        return $this->circular;
    }

    public function setCircular(?Circular $circular): self
    {
        $this->circular = $circular;

        return $this;
    }

    public function getExam(): ?Exam
    {
        return $this->exam;
    }

    public function setExam(?Exam $exam): self
    {
        $this->exam = $exam;

        return $this;
    }
}
