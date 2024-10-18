<?php

namespace App\Entity;

use App\Repository\LicencieRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LicencieRepository::class)]
class Licencie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $nomLicencie = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $prenomLicencie = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $photoLicencie = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateNaissance = null;

    #[ORM\ManyToOne(inversedBy: 'licencies')]
    private ?Club $club_id = null;

    #[ORM\ManyToOne(inversedBy: 'equipe_id')]
    private ?Equipe $equipe = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomLicencie(): ?string
    {
        return $this->nomLicencie;
    }

    public function setNomLicencie(string $nomLicencie): static
    {
        $this->nomLicencie = $nomLicencie;

        return $this;
    }

    public function getPrenomLicencie(): ?string
    {
        return $this->prenomLicencie;
    }

    public function setPrenomLicencie(string $prenomLicencie): static
    {
        $this->prenomLicencie = $prenomLicencie;

        return $this;
    }

    public function getPhotoLicencie(): ?string
    {
        return $this->photoLicencie;
    }

    public function setPhotoLicencie(?string $photoLicencie): static
    {
        $this->photoLicencie = $photoLicencie;

        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->dateNaissance;
    }

    public function setDateNaissance(\DateTimeInterface $dateNaissance): static
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    public function getClubId(): ?Club
    {
        return $this->club_id;
    }

    public function setClubId(?Club $club_id): static
    {
        $this->club_id = $club_id;

        return $this;
    }

    public function getEquipe(): ?Equipe
    {
        return $this->equipe;
    }

    public function setEquipe(?Equipe $equipe): static
    {
        $this->equipe = $equipe;

        return $this;
    }
}