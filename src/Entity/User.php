<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
// use Webmozart\Assert\Assert;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User extends Personne
{
   

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $login;

    #[Assert\Length( min: 3,max: 8, minMessage: 'Mot de passe trop court ',maxMessage: 'trop long mot de passe')]
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    // #[Assert\lenght(min:"8",minMessage:"Le mot de passe est court")]

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
