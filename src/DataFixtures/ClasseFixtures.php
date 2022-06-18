<?php

namespace App\DataFixtures;

use App\Entity\Classe;
use App\Entity\Rp;
use App\Repository\ClasseRepository;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ClasseFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $filieres=['Dev Web','Dev Mobile','Dev Web Mobile'];
// $ata=['Mbayepro','Mor Diagne','Astou Fall'];

        $niveaux=['L1','L2','L3'];
        for ($i=0; $i <10 ; $i++) { 
            # code...           
            $classe= new Classe;
        // $ac=new Ac;
        // $ata=$ac->findAll();
            $rand=rand(0,2);
            $classe->setFiliere($filieres[$rand])
                   ->setNiveau($niveaux[$rand])
                   ->setLibelle($niveaux[$rand].' '.$filieres[$rand]);
                //    $rp=new Rp;
                   $ref=rand(0,2);  
                //    $classe->setRp($this->getReference("rp".$i));
                //    ->setAc($this->getReference('ac',$ac));
            $manager->persist($classe);
            $this->addReference('classe'.$i,$classe);
        }
        $manager->flush();
    }
}


