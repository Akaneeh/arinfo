<?php

namespace App\Entity;

use App\Repository\EquipeRepository;
use App\Repository\LicencieRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EquipeRepository::class)]
class Equipe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $nomEquipe = null;

    /**
     * @var Collection<int, Licencie>
     */
    #[ORM\OneToMany(targetEntity: Licencie::class, mappedBy: 'equipe')]
    private Collection $equipe_id;

    #[ORM\ManyToOne(inversedBy: 'equipe_id')]
    private ?Club $club = null;

    #[ORM\OneToMany(targetEntity: Licencie::class, mappedBy: 'equipe')]
    private Collection $licencies;

    public function __construct()
    {
        $this->licencies = new ArrayCollection();
        $this->equipe_id = new ArrayCollection();
    }
    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomEquipe(): ?string
    {
        return $this->nomEquipe;
    }

    public function setNomEquipe(string $nomEquipe): static
    {
        $this->nomEquipe = $nomEquipe;

        return $this;
    }

    /**
     * @return Collection<int, Licencie>
     */
    public function getEquipeId(): Collection
    {
        return $this->equipe_id;
    }

    public function addEquipeId(Licencie $equipeId): static
    {
        if (!$this->equipe_id->contains($equipeId)) {
            $this->equipe_id->add($equipeId);
            $equipeId->setEquipe($this);
        }

        return $this;
    }

    public function removeEquipeId(Licencie $equipeId): static
    {
        if ($this->equipe_id->removeElement($equipeId)) {
            if ($equipeId->getEquipe() === $this) {
                $equipeId->setEquipe(null);
            }
        }

        return $this;
    }

    public function getClub(): ?Club
    {
        return $this->club;
    }

    public function setClub(?Club $club): static
    {
        $this->club = $club;

        return $this;
    }
}
