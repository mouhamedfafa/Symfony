<?php

namespace App\Entity;

use App\Repository\InscriptionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InscriptionRepository::class)]
class Inscription
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;



   

    #[ORM\ManyToOne(targetEntity: AnneScolaire::class, inversedBy: 'AnneScolaire')]
    private $anneScolaire;

    #[ORM\ManyToOne(targetEntity: Etudiant::class, inversedBy: 'inscriptions')]
    private $etudiant;

    #[ORM\ManyToOne(targetEntity: Classe::class, inversedBy: 'inscriptions')]
    private $classe;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAnneScolaire(): ?AnneScolaire
    {
        return $this->anneScolaire;
    }

    public function setAnneScolaire(?AnneScolaire $anneScolaire): self
    {
        $this->anneScolaire = $anneScolaire;

        return $this;
    }

    public function getEtudiant(): ?Etudiant
    {
        return $this->etudiant;
    }

    public function setEtudiant(?Etudiant $etudiant): self
    {
        $this->etudiant = $etudiant;

        return $this;
    }

    public function getClasse(): ?Classe
    {
        return $this->classe;
    }

    public function setClasse(?Classe $classe): self
    {
        $this->classe = $classe;

        return $this;
    }

}
