<?php

namespace App\Entity;

use App\Repository\AnneScolaireRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AnneScolaireRepository::class)]
class AnneScolaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\OneToMany(mappedBy: 'anneScolaire', targetEntity: Inscription::class)]
    private $AnneScolaire;

    public function __construct()
    {
        $this->AnneScolaire = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Inscription>
     */
    public function getAnneScolaire(): Collection
    {
        return $this->AnneScolaire;
    }

    public function addAnneScolaire(Inscription $anneScolaire): self
    {
        if (!$this->AnneScolaire->contains($anneScolaire)) {
            $this->AnneScolaire[] = $anneScolaire;
            $anneScolaire->setAnneScolaire($this);
        }

        return $this;
    }

    public function removeAnneScolaire(Inscription $anneScolaire): self
    {
        if ($this->AnneScolaire->removeElement($anneScolaire)) {
            // set the owning side to null (unless already changed)
            if ($anneScolaire->getAnneScolaire() === $this) {
                $anneScolaire->setAnneScolaire(null);
            }
        }

        return $this;
    }
}
