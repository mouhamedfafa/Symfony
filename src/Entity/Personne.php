<?php

namespace App\Entity;

use App\Repository\PersonneRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\InheritanceType;
use Doctrine\ORM\Mapping\DiscriminatorColumn;
use Doctrine\ORM\Mapping\DiscriminatorMap;


#[InheritanceType("JOINED")]
#[DiscriminatorColumn(name: "discr", type: "string")]
#[DiscriminatorMap(["personne" => "Personne", "professeur" => "Professeur","etudiant"=>"Etudiant","ac" =>"Ac","rp"=>"Rp","user"=>"User"])]
#[ORM\Entity(repositoryClass: PersonneRepository::class)]

 class Personne
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[Assert\NotBlank(message:'Ce champs Ne peut pas etre pas vide')]
    #[ORM\Column(type: 'string', length: 30)]
    #[Assert\Length( min:4,max: 12, minMessage: "Mot de passe trop court")]
    private $nomComplet;

    #[ORM\Column(type: 'string', length: 10, nullable: true)]
    private $sexe;

    #[Assert\Length( min: 4,max: 13, minMessage: 'Mot de passe trop court ',maxMessage: 'trop long mot de passe')]
    #[ORM\Column(type: 'string', length: 15, nullable: true)]
    private $adresse;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomComplet(): ?string
    {
        return $this->nomComplet;
    }

    public function setNomComplet(string $nomComplet): self
    {
        $this->nomComplet = $nomComplet;

        return $this;
    }

   

   

    

    /**
     * Get the value of sexe
     */ 
    public function getSexe()
    {
        return $this->sexe;
    }

    /**
     * Set the value of sexe
     *
     * @return  self
     */ 
    public function setSexe($sexe)
    {
        $this->sexe = $sexe;

        return $this;
    }

    /**
     * Get the value of adresse
     */ 
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set the value of adresse
     *
     * @return  self
     */ 
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get the value of grade
     */ 
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
}
