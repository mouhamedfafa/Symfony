<?php

namespace App\DataFixtures;

use App\Entity\AnneScolaire;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AnneScolaireFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $annee=['2019/2020','2020/2021','2021/2022'];
        $eta=['Terminée','Terminée','EN cours...'];
        
               
                for ($i=0; $i <2 ; $i++) { 
                    # code...           
                    $an= new AnneScolaire;
               
                    $an->setLibelleAnne($annee[$i])
                        ->setEtat($eta[$i]);
                        
                     
                    $manager->persist($an);
                    // $this->addReference('classe'.$i,$an);
                }

        $manager->flush();
    }
}
