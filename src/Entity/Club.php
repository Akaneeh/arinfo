<?php

namespace App\Entity;

use App\Repository\ClubRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClubRepository::class)]
class Club
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $nomClub = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $sportClub = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $adresseClub = null;

    /**
     * @var Collection<int, Licencie>
     */
    #[ORM\OneToMany(targetEntity: Licencie::class, mappedBy: 'club_id')]
    private Collection $licencies;

    /**
     * @var Collection<int, Equipe>
     */
    #[ORM\OneToMany(targetEntity: Equipe::class, mappedBy: 'club')]
    private Collection $equipe_id;

    public function __construct()
    {
        $this->equipe_id = new ArrayCollection();
        $this->licencies = new ArrayCollection();
        $this->equipe_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomClub(): ?string
    {
        return $this->nomClub;
    }

    public function setNomClub(string $nomClub): static
    {
        $this->nomClub = $nomClub;

        return $this;
    }

    public function getSportClub(): ?string
    {
        return $this->sportClub;
    }

    public function setSportClub(string $sportClub): static
    {
        $this->sportClub = $sportClub;

        return $this;
    }

    public function getAdresseClub(): ?string
    {
        return $this->adresseClub;
    }

    public function setAdresseClub(string $adresseClub): static
    {
        $this->adresseClub = $adresseClub;

        return $this;
    }

    /**
     * @return Collection<int, Licencie>
     */
    public function getLicencies(): Collection
    {
        return $this->licencies;
    }

    public function addLicency(Licencie $licency): static
    {
        if (!$this->licencies->contains($licency)) {
            $this->licencies->add($licency);
            $licency->setClubId($this);
        }

        return $this;
    }

    public function removeLicency(Licencie $licency): static
    {
        if ($this->licencies->removeElement($licency)) {
            if ($licency->getClubId() === $this) {
                $licency->setClubId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Equipe>
     */
    public function getEquipeId(): Collection
    {
        return $this->equipe_id;
    }

    public function addEquipeId(Equipe $equipeId): static
    {
        if (!$this->equipe_id->contains($equipeId)) {
            $this->equipe_id->add($equipeId);
            $equipeId->setClub($this);
        }

        return $this;
    }

    public function removeEquipeId(Equipe $equipeId): static
    {
        if ($this->equipe_id->removeElement($equipeId)) {
            if ($equipeId->getClub() === $this) {
                $equipeId->setClub(null);
            }
        }

        return $this;
    }
}
