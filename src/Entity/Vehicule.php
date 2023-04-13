<?php

namespace App\Entity;

use App\Repository\VehiculeRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
#[ORM\Table("VEHICULE")]

#[ORM\Entity(repositoryClass: VehiculeRepository::class)]
class Vehicule
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 32)]
    private ?string $Immatriculation = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $Dateachat = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImmatriculation(): ?string
    {
        return $this->Immatriculation;
    }

    public function setImmatriculation(string $Immatriculation): self
    {
        $this->Immatriculation = $Immatriculation;

        return $this;
    }

    public function getDateachat(): ?\DateTimeInterface
    {
        return $this->Dateachat;
    }

    public function setDateachat(\DateTimeInterface $Dateachat): self
    {
        $this->Dateachat = $Dateachat;

        return $this;
    }
}
