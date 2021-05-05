<?php

namespace App\Entity;

use App\Repository\SubjectRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SubjectRepository::class)
 */
class Subject
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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $teacher;

    /**
     * @ORM\ManyToOne(targetEntity=ClassSchool::class, inversedBy="subjects")
     */
    private $classschool;

    /**
     * @ORM\OneToMany(targetEntity=Lesson::class, mappedBy="subject")
     */
    private $lessons;

    /**
     * @ORM\OneToMany(targetEntity=Essai::class, mappedBy="subject")
     */
    private $essais;

    /**
     * @ORM\OneToMany(targetEntity=Exam::class, mappedBy="subject")
     */
    private $exams;

    /**
     * @ORM\OneToMany(targetEntity=Mediatheque::class, mappedBy="subject")
     */
    private $mediatheques;

    public function __construct()
    {
        $this->lessons = new ArrayCollection();
        $this->essais = new ArrayCollection();
        $this->exams = new ArrayCollection();
        $this->mediatheques = new ArrayCollection();
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

    public function getTeacher(): ?string
    {
        return $this->teacher;
    }

    public function setTeacher(?string $teacher): self
    {
        $this->teacher = $teacher;

        return $this;
    }

    public function getClassschool(): ?ClassSchool
    {
        return $this->classschool;
    }

    public function setClassschool(?ClassSchool $classschool): self
    {
        $this->classschool = $classschool;

        return $this;
    }

    /**
     * @return Collection|Lesson[]
     */
    public function getLessons(): Collection
    {
        return $this->lessons;
    }

    public function addLesson(Lesson $lesson): self
    {
        if (!$this->lessons->contains($lesson)) {
            $this->lessons[] = $lesson;
            $lesson->setSubject($this);
        }

        return $this;
    }

    public function removeLesson(Lesson $lesson): self
    {
        if ($this->lessons->removeElement($lesson)) {
            // set the owning side to null (unless already changed)
            if ($lesson->getSubject() === $this) {
                $lesson->setSubject(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Essai[]
     */
    public function getEssais(): Collection
    {
        return $this->essais;
    }

    public function addEssai(Essai $essai): self
    {
        if (!$this->essais->contains($essai)) {
            $this->essais[] = $essai;
            $essai->setSubject($this);
        }

        return $this;
    }

    public function removeEssai(Essai $essai): self
    {
        if ($this->essais->removeElement($essai)) {
            // set the owning side to null (unless already changed)
            if ($essai->getSubject() === $this) {
                $essai->setSubject(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Exam[]
     */
    public function getExams(): Collection
    {
        return $this->exams;
    }

    public function addExam(Exam $exam): self
    {
        if (!$this->exams->contains($exam)) {
            $this->exams[] = $exam;
            $exam->setSubject($this);
        }

        return $this;
    }

    public function removeExam(Exam $exam): self
    {
        if ($this->exams->removeElement($exam)) {
            // set the owning side to null (unless already changed)
            if ($exam->getSubject() === $this) {
                $exam->setSubject(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Mediatheque[]
     */
    public function getMediatheques(): Collection
    {
        return $this->mediatheques;
    }

    public function addMediatheque(Mediatheque $mediatheque): self
    {
        if (!$this->mediatheques->contains($mediatheque)) {
            $this->mediatheques[] = $mediatheque;
            $mediatheque->setSubject($this);
        }

        return $this;
    }

    public function removeMediatheque(Mediatheque $mediatheque): self
    {
        if ($this->mediatheques->removeElement($mediatheque)) {
            // set the owning side to null (unless already changed)
            if ($mediatheque->getSubject() === $this) {
                $mediatheque->setSubject(null);
            }
        }

        return $this;
    }
}
