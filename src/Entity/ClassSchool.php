<?php

namespace App\Entity;

use App\Repository\ClassSchoolRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClassSchoolRepository::class)
 */
class ClassSchool
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=120)
     */
    private $scolaryear;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

    /**
     * @ORM\OneToOne(targetEntity=Circular::class, mappedBy="schoolclass", cascade={"persist", "remove"})
     */
    private $circular;

    /**
     * @ORM\OneToMany(targetEntity=Student::class, mappedBy="classschool")
     */
    private $students;

    /**
     * @ORM\OneToOne(targetEntity=Schedule::class, mappedBy="classschool", cascade={"persist", "remove"})
     */
    private $schedule;

    /**
     * @ORM\OneToMany(targetEntity=Subject::class, mappedBy="classschool")
     */
    private $subjects;

    public function __construct()
    {
        $this->students = new ArrayCollection();
        $this->subjects = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getScolaryear(): ?string
    {
        return $this->scolaryear;
    }

    public function setScolaryear(string $scolaryear): self
    {
        $this->scolaryear = $scolaryear;

        return $this;
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

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getCircular(): ?Circular
    {
        return $this->circular;
    }

    public function setCircular(?Circular $circular): self
    {
        // unset the owning side of the relation if necessary
        if ($circular === null && $this->circular !== null) {
            $this->circular->setSchoolclass(null);
        }

        // set the owning side of the relation if necessary
        if ($circular !== null && $circular->getSchoolclass() !== $this) {
            $circular->setSchoolclass($this);
        }

        $this->circular = $circular;

        return $this;
    }

    /**
     * @return Collection|Student[]
     */
    public function getStudents(): Collection
    {
        return $this->students;
    }

    public function addStudent(Student $student): self
    {
        if (!$this->students->contains($student)) {
            $this->students[] = $student;
            $student->setClassschool($this);
        }

        return $this;
    }

    public function removeStudent(Student $student): self
    {
        if ($this->students->removeElement($student)) {
            // set the owning side to null (unless already changed)
            if ($student->getClassschool() === $this) {
                $student->setClassschool(null);
            }
        }

        return $this;
    }

    public function getSchedule(): ?Schedule
    {
        return $this->schedule;
    }

    public function setSchedule(?Schedule $schedule): self
    {
        // unset the owning side of the relation if necessary
        if ($schedule === null && $this->schedule !== null) {
            $this->schedule->setClassschool(null);
        }

        // set the owning side of the relation if necessary
        if ($schedule !== null && $schedule->getClassschool() !== $this) {
            $schedule->setClassschool($this);
        }

        $this->schedule = $schedule;

        return $this;
    }

    /**
     * @return Collection|Subject[]
     */
    public function getSubjects(): Collection
    {
        return $this->subjects;
    }

    public function addSubject(Subject $subject): self
    {
        if (!$this->subjects->contains($subject)) {
            $this->subjects[] = $subject;
            $subject->setClassschool($this);
        }

        return $this;
    }

    public function removeSubject(Subject $subject): self
    {
        if ($this->subjects->removeElement($subject)) {
            // set the owning side to null (unless already changed)
            if ($subject->getClassschool() === $this) {
                $subject->setClassschool(null);
            }
        }

        return $this;
    }
}
