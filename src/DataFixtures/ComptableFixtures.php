<?php

namespace App\DataFixtures;

use App\Entity\Commercial;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class CommercialFixtures extends Fixture
{
    public function __construct(UserPasswordEncoderInterface $encoder)
    {
    $this->encoder = $encoder;
    }
    
    public function load(ObjectManager $manager)
    {
        for ($i=0; $i<15; $i++){
            $user = new Comptable();
            $user->setEmail('comptable'.$i.'@email.com');
            $user->setPrenom('Prenom'.$i.'');
            $user->setNom('Nom'.$i.'');
            $user->setRoles([]);
            $user->setPassword($this->encoder->encodePassword(
                            $user,
                            '12345'
            ));
            $manager->persist($user);
            $manager->flush();
        }
    }
}
