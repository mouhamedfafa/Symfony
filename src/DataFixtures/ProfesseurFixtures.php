<?php

namespace App\DataFixtures;

use App\Entity\Professeur;
use App\Entity\Classe;

use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ProfesseurFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $module = ["JAVA","PHP","JAVASCRIPT","SYMFONY"];
        $sexes=["Hom", "Fem"];
        $adresse=["Dakar","THies","Pikine","Tamba","Touba","Keur Massar","Fass Mbao","Ziginchore","Wagou gnay","Khelcoom"];
        $nomcomplet=["Modou Diop", "Pathe Sow","Demba Faye","Koni Faye","Bongoman Diop","Maniam Diop", "Ku baax Diop","Salla Mou Bonn Mi","Nokass","Mbaye Peekh"];
        $grade=["Ingenieur","expert","Docteur"];
        // $product = new Product();
        // $manager->persist($product);

  

        for ($i=0; $i < 10; $i++) { 
            # code...
           
            $adresseRand=rand(0,9);
            $sexeRand=rand(0,1);
            $nomRand=rand(0,9);
            $gradRand=rand(0,2);



            $prof= new Professeur();
            
            
            $prof->setNomComplet( $nomcomplet[$nomRand]);
            $prof->setAdresse($adresse[$adresseRand]);
            $prof->setSexe($sexes[$sexeRand] );
            $prof->setGrade($grade[$gradRand]);
            for ($j=0; $j < 2; $j++) { 
                # code...
                $ref=rand(0,9); 
                $prof->addProfclass($this->getReference('classe'.$ref));
            }
            $manager->persist($prof);

    
        }
        $manager->flush();
    }
}
