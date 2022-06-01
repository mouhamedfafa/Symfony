<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity(repositoryClass: UserRepository::class)]



class User extends Personne
{
   

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $login;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $Password;

    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    private $role;

    public function getLogin(): ?string
    {
        return $this->login;
    }

    public function setLogin(?string $login): self
    {
        $this->login = $login;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->Password;
    }

    public function setPassword(?string $Password): self
    {
        $this->Password = $Password;

        return $this;
    }


    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): self
    {
        $this->role = $role;
        return $this;
    }
}
