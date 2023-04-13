<?php

namespace App\Entity;

use App\Repository\FormuleSansChauffeurRepository;
use Doctrine\ORM\Mapping as ORM;
#[ORM\Table("FORMULESANSCHAUFFEUR")]

#[ORM\Entity(repositoryClass: FormuleSansChauffeurRepository::class)]
class FormuleSansChauffeur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $Duree = null;

    #[ORM\Column]
    private ?int $Nbkminclus = null;

    #[ORM\Column(length: 255)]
    private ?string $Libelle = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDuree(): ?int
    {
        return $this->Duree;
    }

    public function setDuree(int $Duree): self
    {
        $this->Duree = $Duree;

        return $this;
    }

    public function getNbkminclus(): ?int
    {
        return $this->Nbkminclus;
    }

    public function setNbKmInclus(int $Nbkminclus): self
    {
        $this->Nbkminclus = $Nbkminclus;

        return $this;
    }

    public function getLibelle(): ?string
    {
        return $this->Libelle;
    }

    public function setLibelle(string $Libelle): self
    {
        $this->Libelle = $Libelle;

        return $this;
    }
}
