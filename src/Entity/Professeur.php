<?php

namespace App\Entity;

use App\Repository\ProfesseurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProfesseurRepository::class)]
class Professeur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nom_professeur = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $prenom_professeur = null;

    // Relation avec Classes
    #[ORM\OneToMany(mappedBy: 'professeur', targetEntity: Classes::class)]
    private Collection $classes;

    public function __construct()
    {
        $this->classes = new ArrayCollection();
    }

    // Getters & setters pour la relation Prof-classe
    /**
     * @return Collection<int, Classe>
     */
    public function getClasses(): Collection
    {
        return $this->classes;
    }

    public function addClasse(Classes $classe): self
    {
        if (!$this->classes->contains($classe)) {
            $this->classes[] = $classe;
            $classe->setProfesseur($this);
        }

        return $this;
    }

    public function removeClasse(Classes $classe): self
    {
        if ($this->classes->removeElement($classe)) {
            if ($classe->getProfesseur() === $this) {
                $classe->setProfesseur(null);
            }
        }

        return $this;
    }

    // Autres getters & setters
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomProfesseur(): ?string
    {
        return $this->nom_professeur;
    }

    public function setNomProfesseur(?string $nom_professeur): static
    {
        $this->nom_professeur = $nom_professeur;

        return $this;
    }

    public function getPrenomProfesseur(): ?string
    {
        return $this->prenom_professeur;
    }

    public function setPrenomProfesseur(?string $prenom_professeur): static
    {
        $this->prenom_professeur = $prenom_professeur;

        return $this;
    }
}