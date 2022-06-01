<?php

namespace App\DataFixtures;

use App\Entity\Etudiant;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class EtudiantFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        
        $sexes=["Hom", "Fem"];
        $adresse=["Dakar","THies","Pikine","Tamba","Touba","Keur Massar","Fass Mbao","Ziginchore","Wagou gnay","Khelcoom"];
        $nomcomplet=["Badou Faye","SIDI","Rama Faye","Ansou Ka","Abdou Diop","Malal Ndiaye","Itachi Utchiwa","Saye Probleme","Nokass Fall","Mballo Bandit"];
        
        for ($i=0; $i < 10; $i++) { 
            # code...
           
            $adresseRand=rand(0,9);
            $sexeRand=rand(0,1);
            $nomRand=rand(0,9);
            $Matrand=rand(0,2);


            $etu= new Etudiant();
$str=$nomcomplet[$nomRand];
            
            
            $etu->setNomComplet( $nomcomplet[$nomRand]);
            $etu->setAdresse($adresse[$adresseRand]);
            $etu->setSexe($sexes[$sexeRand] );
            $etu->setMatricule( $str,$i);

            


            for ($j=0; $j < 2; $j++) { 
                # code...
                $ref=rand(0,9); 
                $etu->setClasse($this->getReference('classe'.$ref));
            }
            $manager->persist($etu);

    
        }
        $manager->flush();
    
    }
}
