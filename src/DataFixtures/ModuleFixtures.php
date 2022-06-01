<?php

namespace App\DataFixtures;

use App\Entity\Module;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ModuleFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $module=['PHP','UML','MATHS','JAVA SCRIPT','ALGEBRE','ANALYSE'];
        for ($i=0; $i <5 ; $i++) { 
            # code..
            $mod= new Module;
        
            $mod->setLibelleModule("fjjoled");
            $manager->persist($mod);
            
        }

        $manager->flush();
    }
}
