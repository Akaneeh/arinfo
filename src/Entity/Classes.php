<?php

namespace App\Entity;

use App\Repository\ClassesRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Professeur;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity(repositoryClass: ClassesRepository::class)]
class Classes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nomClasse = null;

    // Relation avec Professeur
    #[ORM\ManyToOne(targetEntity: Professeur::class, inversedBy: 'classes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Professeur $professeur = null;

    // Relation avec Eleves
    #[ORM\OneToMany(mappedBy: 'classe', targetEntity: Eleves::class)]
    private Collection $eleves;

    public function __construct()
    {
        $this->eleves = new ArrayCollection();
    }

    // Autres getters & setters
    public function getProfesseur(): ?Professeur
    {
        return $this->professeur;
    }

    public function setProfesseur(?Professeur $professeur): self
    {
        $this->professeur = $professeur;

        return $this;
    }

    public function getEleves(): Collection
    {
        return $this->eleves;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomClasse(): ?string
    {
        return $this->nomClasse;
    }

    public function setNomClasse(string $nomClasse): self
    {
        $this->nomClasse = $nomClasse;

        return $this;
    }
}