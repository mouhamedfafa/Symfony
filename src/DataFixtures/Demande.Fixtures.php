<?php

namespace App\DataFixtures;

use App\Entity\Demande;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class DemandeFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
      
        
            $libelle=['demande d annulation','demande de derogation','demandes changement d option'];
            $etat=['En cours','acceptée','rejetée'];
            for ($i=0; $i <10 ; $i++) { 
                # code...
                $rand=rand(0,2);
                $demande=new Demande;
            
                $demande->setLibelleDemande($libelle[$rand])
                ->setEtat($etat[$rand]);
                for ($j=0; $j < 2; $j++) { 
                    # code...
                    $ref=rand(0,9); 
                    // $demande->setEtudiant($this->getReference('etudiant'.$ref));
                } 
                $manager->persist($demande);
           
       
    }
    $manager->flush();

    }

}
    