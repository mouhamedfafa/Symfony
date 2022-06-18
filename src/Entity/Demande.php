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

    #[ORM\ManyToOne(targetEntity: Inscription::class, inversedBy: 'demandes')]
    private $inscription;

    #[ORM\ManyToOne(targetEntity: Rp::class, inversedBy: 'demandes')]
    private $rp;


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

    public function getInscription(): ?Inscription
    {
        return $this->inscription;
    }

    public function setInscription(?Inscription $inscription): self
    {
        $this->inscription = $inscription;

        return $this;
    }

    public function getRp(): ?Rp
    {
        return $this->rp;
    }

    public function setRp(?Rp $rp): self
    {
        $this->rp = $rp;

        return $this;
    }

}
