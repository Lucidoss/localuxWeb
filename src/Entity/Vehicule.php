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
    private ?int $Immatriculation = null;

    #[ORM\Column(length: 32)]
    private ?string $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $Dateachat = null;

    public function getImmatriculation(): ?int
    {
        return $this->Immatriculation;
    }

    public function getid(): ?string
    {
        return $this->id;
    }

    public function setid(string $Immatriculation): self
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
