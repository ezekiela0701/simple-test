<?php

namespace App\Entity;

use App\Repository\StudentRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StudentRepository::class)
 */
class Student
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $photo;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adress;

    /**
     * @ORM\Column(type="datetime")
     */
    private $birthday;

    /**
     * @ORM\Column(type="integer")
     */
    private $numberid;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $matriculel;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $contactparent;

    /**
     * @ORM\ManyToOne(targetEntity=ClassSchool::class, inversedBy="students")
     */
    private $classschool;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(?string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(?string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(string $adress): self
    {
        $this->adress = $adress;

        return $this;
    }

    public function getBirthday(): ?\DateTimeInterface
    {
        return $this->birthday;
    }

    public function setBirthday(\DateTimeInterface $birthday): self
    {
        $this->birthday = $birthday;

        return $this;
    }

    public function getNumberid(): ?int
    {
        return $this->numberid;
    }

    public function setNumberid(int $numberid): self
    {
        $this->numberid = $numberid;

        return $this;
    }

    public function getMatriculel(): ?string
    {
        return $this->matriculel;
    }

    public function setMatriculel(string $matriculel): self
    {
        $this->matriculel = $matriculel;

        return $this;
    }

    public function getContactparent(): ?string
    {
        return $this->contactparent;
    }

    public function setContactparent(string $contactparent): self
    {
        $this->contactparent = $contactparent;

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
}
