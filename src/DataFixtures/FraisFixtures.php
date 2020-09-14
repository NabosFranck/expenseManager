<?php

namespace App\DataFixtures;

use App\Entity\Frais;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class FraisFixtures extends Fixture
{
    
    public function load(ObjectManager $manager)
    {
        for ($i=0; $i<15; $i++){
            $user = new Frais();
            $user->setEtat(true);
            $user->setTrajet(100);
            $user->setNuit(115);
            $user->setRepas(120);
           
           
            $manager->persist($user);
            $manager->flush();
        }
       
    
    }
}
