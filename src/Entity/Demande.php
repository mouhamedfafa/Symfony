<?php

namespace App\Entity;

use App\Repository\DemandeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DemandeRepository::class)]
class Demande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $libelleDemande;

    #[ORM\Column(type: 'string', length: 255)]
    private $Etat;

    #[ORM\OneToOne(targetEntity: Etudiant::class, inversedBy: 'demande')]
    private $etudiant;



  

    public function __construct()
    {
        $this->demande = new ArrayCollection();
        
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelleDemande(): ?string
    {
        return $this->libelleDemande;
    }

    public function setLibelleDemande(?string $libelleDemande): self
    {
        $this->libelleDemande = $libelleDemande;

        return $this;
    }

    public function getEtat(): ?string
    {
        return $this->Etat;
    }

    public function setEtat(string $Etat): self
    {
        $this->Etat = $Etat;

        return $this;
    }

    // public function getDemande(): ?Etudiant
    // {
    //     return $this->demande;
    // }

    // public function setDemande(?Etudiant $demande): self
    // {
    //     $this->demande = $demande;

    //     return $this;
    // }

    public function getEtudiant(): ?Etudiant
    {
        return $this->etudiant;
    }

    public function setEtudiant(?Etudiant $etudiant): self
    {
        $this->etudiant = $etudiant;

        return $this;
    }

  



  
    

  

   

}
