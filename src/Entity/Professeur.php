<?php

namespace App\Entity;

use App\Repository\ProfesseurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProfesseurRepository::class)]
class Professeur extends Personne
{
   
    

    #[ORM\ManyToOne(targetEntity: Rp::class, inversedBy: 'professeurs')]
    private $Professeur;

    #[ORM\ManyToMany(targetEntity: Classe::class, mappedBy: 'classprof')]
    private $profclass;

   

    #[ORM\Column(type: 'string', length: 15)]
    private $grade;

    #[ORM\OneToMany(mappedBy: 'professeur', targetEntity: Module::class)]
    private $module;

  

    public function __construct()
    {
        $this->modules = new ArrayCollection();
        $this->profclass = new ArrayCollection();
        $this->module = new ArrayCollection();
      
    }

 

 public function getGrade()
                            {
                                return $this->grade;
                            }

    /**
     * Set the value of grade
     *
     * @return  self
     */ 
    public function setGrade($grade)
    {
        $this->grade = $grade;

        return $this;
    }
    

    

    /**
     * @return Collection<int, Classe>
     */

    /**
     * @return Collection<int, Classe>
     */
    public function getProfclass(): Collection
    {
        return $this->profclass;
    }

    public function addProfclass(Classe $profclass): self
    {
        if (!$this->profclass->contains($profclass)) {
            $this->profclass[] = $profclass;
            $profclass->addClassprof($this);
        }

        return $this;
    }

    public function removeProfclass(Classe $profclass): self
    {
        if ($this->profclass->removeElement($profclass)) {
            $profclass->removeClassprof($this);
        }

        return $this;   
    }

    /**
     * @return Collection<int, Module>
     */
    public function getModule(): Collection
    {
        return $this->module;
    }

    public function addModule(Module $module): self
    {
        if (!$this->module->contains($module)) {
            $this->module[] = $module;
            $module->setProfesseur($this);
        }

        return $this;
    }

    public function removeModule(Module $module): self
    {
        if ($this->module->removeElement($module)) {
            // set the owning side to null (unless already changed)
            if ($module->getProfesseur() === $this) {
                $module->setProfesseur(null);
            }
        }

        return $this;
    }

   
    
}
