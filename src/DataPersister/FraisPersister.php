<?php

namespace App\DataPersister;

use App\Entity\Frais;
use Doctrine\ORM\EntityManagerInterface;
use ApiPlatform\Core\DataPersister\DataPersisterInterface;

class FraisPersister implements DataPersisterInterface
{
    protected $em;

    public function __construct(EntityManagerInterface $em){

        $this->em = $em;

    }
    
    public function supports($data): bool{

        return $data instanceof Frais;

    }

    public function persist($data){

        $data->setCreatedAt(new \DateTime());
        $this->em->persist($data);
        $this->em->flush($data);


    }

    public function remove($data){

    }
}