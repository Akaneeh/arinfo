<?php

namespace App\Entity;

use App\Repository\ElevesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Classes;

#[ORM\Entity(repositoryClass: ElevesRepository::class)]
class Eleves
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $nom_eleve = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $prenom_eleve = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_naissance_eleve = null;

    // Relation avec Classes
    #[ORM\ManyToOne(targetEntity: Classes::class, inversedBy: 'eleves')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Classes $classe = null;

    // Autres getters & setters
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomEleve(): ?string
    {
        return $this->nom_eleve;
    }

    public function setNomEleve(string $nom_eleve): static
    {
        $this->nom_eleve = $nom_eleve;

        return $this;
    }

    public function getPrenomEleve(): ?string
    {
        return $this->prenom_eleve;
    }

    public function setPrenomEleve(string $prenom_eleve): static
    {
        $this->prenom_eleve = $prenom_eleve;

        return $this;
    }

    public function getDateNaissanceEleve(): ?\DateTimeInterface
    {
        return $this->date_naissance_eleve;
    }

    public function setDateNaissanceEleve(\DateTimeInterface $date_naissance_eleve): static
    {
        $this->date_naissance_eleve = $date_naissance_eleve;

        return $this;
    }

    public function getClasse(): ?Classes
    {
        return $this->classe;
    }

    public function setClasse(?Classes $classe): static
    {
        $this->classe = $classe;

        return $this;
    }
}