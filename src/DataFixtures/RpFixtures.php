<?php

namespace App\DataFixtures;

use App\Entity\Rp;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class RpFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $tab=['Moussa','Modou','Oumou'];    
        for ($i=0; $i < 3; $i++) { 

            $rp = new Rp();
              
            $rp->setNomComplet($tab[$i]);
            $rp->setAdresse($tab[$i]);
            $manager->persist($rp);
            $this->addReference("rp".$i,$rp);            
        }
        
        $manager->flush();
    }
}
