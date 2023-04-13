<?php

namespace App\Entity;

use App\Repository\ModeleRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ModeleRepository::class)]
#[ORM\Table("MODELE")]

class Modele
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 32)]
    private ?string $nom = null;

    #[ORM\Column]
    private ?int $tarifkmsupplementaire = null;

    #[ORM\Column]
    private ?int $nbplaces = null;

    #[ORM\Column]
    private ?int $vitessemax = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getTarifkmsupplementaire(): ?int
    {
        return $this->tarifkmsupplementaire;
    }

    public function setTarifkmsupplementaire(int $tarifkmsupplementaire): self
    {
        $this->tarifkmsupplementaire = $tarifkmsupplementaire;

        return $this;
    }

    public function getNbplaces(): ?int
    {
        return $this->nbplaces;
    }

    public function setNbplaces(int $nbplaces): self
    {
        $this->nbplaces = $nbplaces;

        return $this;
    }

    public function getVitessemax(): ?int
    {
        return $this->vitessemax;
    }

    public function setVitessemax(int $vitessemax): self
    {
        $this->vitessemax = $vitessemax;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    
    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }
}
