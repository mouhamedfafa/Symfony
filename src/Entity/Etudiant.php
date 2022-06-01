<?php

namespace App\Entity;

use App\Repository\EtudiantRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EtudiantRepository::class)]
class Etudiant extends User
{
    

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $matricule;

   

    #[ORM\OneToMany(mappedBy: 'etudiant', targetEntity: Demande::class)]
    private $demande;

    #[ORM\ManyToOne(targetEntity: Classe::class, inversedBy: 'classetu')]
    private $classe;

    #[ORM\OneToMany(mappedBy: 'etudiant', targetEntity: Inscription::class)]
    private $inscriptions;

    


 

  


    public function __construct()
    {
        $this->demande = new ArrayCollection();
        $this->inscriptions = new ArrayCollection();
        
      
    }

   

    public function getMatricule(): ?string
    {
        return $this->matricule;
    }

    public function setMatricule(?string $nom,int $id): self
    {
        $this->matricule = $nom.''.$id;

        return $this;
    }

   

  






    /**
     * @return Collection<int, Demande>
     */
    public function getDemande(): Collection
    {
        return $this->demande;
    }

    public function addDemande(Demande $demande): self
    {
        if (!$this->demande->contains($demande)) {
            $this->demande[] = $demande;
            $demande->setEtudiant($this);
        }

        return $this;
    }

    public function removeDemande(Demande $demande): self
    {
        if ($this->demande->removeElement($demande)) {
            // set the owning side to null (unless already changed)
            if ($demande->getEtudiant() === $this) {
                $demande->setEtudiant(null);
            }
        }

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

    /**
     * @return Collection<int, Inscription>
     */
    public function getInscriptions(): Collection
    {
        return $this->inscriptions;
    }

    public function addInscription(Inscription $inscription): self
    {
        if (!$this->inscriptions->contains($inscription)) {
            $this->inscriptions[] = $inscription;
            $inscription->setEtudiant($this);
        }

        return $this;
    }

    public function removeInscription(Inscription $inscription): self
    {
        if ($this->inscriptions->removeElement($inscription)) {
            // set the owning side to null (unless already changed)
            if ($inscription->getEtudiant() === $this) {
                $inscription->setEtudiant(null);
            }
        }

        return $this;
    }

    


 
  
    

  

   

 

  
}
