<?php

namespace App\Entity;

use App\Repository\RpRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RpRepository::class)]
class Rp extends Personne
{
    

    #[ORM\OneToMany(mappedBy: 'rp', targetEntity: Classe::class)]
    private $Rp;

    #[ORM\ManyToOne(targetEntity: Classe::class, inversedBy: 'classes')]
    private $classe;

    

    public function __construct()
    {
        $this->Rp = new ArrayCollection();
        $this->professeurs = new ArrayCollection();
    }

    

    /**
     * @return Collection<int, Classe>
     */
    public function getRp(): Collection
    {
        return $this->Rp;
    }

    public function addRp(Classe $rp): self
    {
        if (!$this->Rp->contains($rp)) {
            $this->Rp[] = $rp;
            $rp->setRp($this);
        }

        return $this;
    }

    public function removeRp(Classe $rp): self
    {
        if ($this->Rp->removeElement($rp)) {
            // set the owning side to null (unless already changed)
            if ($rp->getRp() === $this) {
                $rp->setRp(null);
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

    


  
}
