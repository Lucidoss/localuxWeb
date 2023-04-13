<?php

namespace App\Entity;

use App\Repository\LocationsanschauffeurRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
#[ORM\Table("LOCATIONSANSCHAUFFEUR")]

#[ORM\Entity(repositoryClass: LocationsanschauffeurRepository::class)]
class Locationsanschauffeur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $Numlocation = null;

    #[ORM\Column]
    private ?int $Idclient = null;

    #[ORM\Column]
    private ?int $Nbkmdepart = null;

    #[ORM\Column(nullable: true)]
    private ?int $Nbkmretour = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $Datelocation = null;

    #[ORM\Column(nullable: true)]
    private ?int $Montantregle = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $Datehredepartprevu = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $Datehredepartreel = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $Datehreretourprevu = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $Datehreretourreel = null;

    public function getNumlocation(): ?int
    {
        return $this->Numlocation;
    }

    public function getIdclient(): ?int
    {
        return $this->Idclient;
    }

    public function setIdclient(int $Idclient): self
    {
        $this->Idclient = $Idclient;

        return $this;
    }

    public function getNbkmdepart(): ?int
    {
        return $this->Nbkmdepart;
    }

    public function setNbkmdepart(int $Nbkmdepart): self
    {
        $this->Nbkmdepart = $Nbkmdepart;

        return $this;
    }

    public function getNbkmretour(): ?int
    {
        return $this->Nbkmretour;
    }

    public function setNbkmretour(?int $Nbkmretour): self
    {
        $this->Nbkmretour = $Nbkmretour;

        return $this;
    }

    public function getDatelocation(): ?\DateTimeInterface
    {
        return $this->Datelocation;
    }

    public function setDatelocation(\DateTimeInterface $Datelocation): self
    {
        $this->Datelocation = $Datelocation;

        return $this;
    }

    public function getMontantregle(): ?int
    {
        return $this->Montantregle;
    }

    public function setMontantregle(int $Montantregle): self
    {
        $this->Montantregle = $Montantregle;

        return $this;
    }

    public function getDatehredepartprevu(): ?\DateTimeInterface
    {
        return $this->Datehredepartprevu;
    }

    public function setDatehredepartprevu(\DateTimeInterface $Datehredepartprevu): self
    {
        $this->Datehredepartprevu = $Datehredepartprevu;

        return $this;
    }

    public function getDatehredepartreel(): ?\DateTimeInterface
    {
        return $this->Datehredepartreel;
    }

    public function setDatehredepartreel(?\DateTimeInterface $Datehredepartreel): self
    {
        $this->Datehredepartreel = $Datehredepartreel;

        return $this;
    }

    public function getDatehreretourprevu(): ?\DateTimeInterface
    {
        return $this->Datehreretourprevu;
    }

    public function setDatehreretourprevu(\DateTimeInterface $Datehreretourprevu): self
    {
        $this->Datehreretourprevu = $Datehreretourprevu;

        return $this;
    }

    public function getDatehreretourreel(): ?\DateTimeInterface
    {
        return $this->Datehreretourreel;
    }

    public function setDatehreretourreel(?\DateTimeInterface $Datehreretourreel): self
    {
        $this->Datehreretourreel = $Datehreretourreel;

        return $this;
    }
}
