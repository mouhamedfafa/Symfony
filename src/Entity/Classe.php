<?php

namespace App\Entity;

use App\Entity\Rp;
use App\Entity\Professeur;
use App\Entity\Inscription;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\ClasseRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity(repositoryClass: ClasseRepository::class)]
class Classe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $libelle;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $filiere;

    #[ORM\Column(type: 'string', length: 255)]
    private $niveau;


    #[ORM\ManyToOne(targetEntity: Rp::class, inversedBy: 'Rp')]
    private $rp;

    #[ORM\OneToMany(mappedBy: 'classe', targetEntity: Rp::class)]
    private $classes;

    #[ORM\ManyToMany(targetEntity: Professeur::class, inversedBy: 'profclass')]
    private $classprof;

    #[ORM\OneToMany(mappedBy: 'classe', targetEntity: Etudiant::class)]
    private $classetu;

    #[ORM\OneToMany(mappedBy: 'classe', targetEntity: Inscription::class)]
    private $inscriptions;

    

    public function __construct()
    {
        
        $this->classes = new ArrayCollection();
        $this->professeurs = new ArrayCollection();
        $this->classprof = new ArrayCollection();
        $this->classetu = new ArrayCollection();
        $this->inscriptions = new ArrayCollection();
       
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(?string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getFiliere(): ?string
    {
        return $this->filiere;
    }

    public function setFiliere(?string $filiere): self
    {
        $this->filiere = $filiere;

        return $this;
    }

    public function getNiveau(): ?string
    {
        return $this->niveau;
    }

    public function setNiveau(string $niveau): self
    {
        $this->niveau = $niveau;

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

 

 

    /**
     * @return Collection<int, Professeur>
     */

    /**
     * @return Collection<int, Professeur>
     */
    public function getClassprof(): Collection
    {
        return $this->classprof;
    }

    public function addClassprof(Professeur $classprof): self
    {
        if (!$this->classprof->contains($classprof)) {
            $this->classprof[] = $classprof;
        }

        return $this;
    }

    public function removeClassprof(Professeur $classprof): self
    {
        $this->classprof->removeElement($classprof);

        return $this;
    }

    /**
     * @return Collection<int, Etudiant>
     */
    public function getClassetu(): Collection
    {
        return $this->classetu;
    }

    public function addClassetu(Etudiant $classetu): self
    {
        if (!$this->classetu->contains($classetu)) {
            $this->classetu[] = $classetu;
            $classetu->setClasse($this);
        }

        return $this;
    }

    public function removeClassetu(Etudiant $classetu): self
    {
        if ($this->classetu->removeElement($classetu)) {
            // set the owning side to null (unless already changed)
            if ($classetu->getClasse() === $this) {
                $classetu->setClasse(null);
            }
        }

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
            $inscription->setClasse($this);
        }

        return $this;
    }

    public function removeInscription(Inscription $inscription): self
    {
        if ($this->inscriptions->removeElement($inscription)) {
            // set the owning side to null (unless already changed)
            if ($inscription->getClasse() === $this) {
                $inscription->setClasse(null);
            }
        }

        return $this;
    }

    
    
   
   
}
