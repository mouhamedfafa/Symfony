<?php

namespace App\DataFixtures;

use App\Entity\Ac;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AcFixtures extends Fixture
{

    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // // $manager->persist($product);
        //     $tab=['Mbayepro','Mor Diagne','Astou Fall'];
        //     for ($i=0; $i < 3; $i++) { 
    
        //         $ac= new Ac;
    
                  
        //     $ac->setNomComplet($tab[$i]);
        //     $ac->setAdresse($tab[$i]);

        //     $this->addReference('ac',$tab[$i]);
            
        //         $manager->persist($ac);
                
        //     }
    
        
        // $manager->flush();
    }
    
}
