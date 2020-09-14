<?php

namespace App\Controller;

use DateTime;
use App\Entity\Frais;
use App\Repository\FraisRepository;
use App\Repository\ClientRepository;
use App\Repository\CommercialRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Serializer\Exception\NotEncodableValueException;

class ApiFraisController extends AbstractController
{
    /**
     * @Route("/apip/commercial/frais/{id}", name="api_read_frais_com", methods ={"GET"})
     */
    public function getComFrais($id,FraisRepository $fraisRepository ){

        
       $frais = $fraisRepository->findBy(["commercial" => $id]);
       dd($frais);
       $TabFrais = [];
        foreach ($frais as $frai){
            $TabFrais[] = (object)[
                
                "id" => $frai->getId(),
                "etat"=> $frai->getEtat(),
                "trajet" => $frai->getTrajet(),
                "repas" => $frai->getRepas(),
                "nuit" => $frai->getNuit(),
                "idclient"=> $frai->getClient()->getId(),
                "nomclient" => $frai->getClient()->getSociete(),
            ];
        }
         return new JsonResponse (["Frais" =>$TabFrais]);
        
    }

<<<<<<< HEAD
    /**
     * @Route("/apip/clients", name="api_read_client", methods ={"GET"})
     */
    public function getComClient(ClientRepository $clientRepository ){
=======
   





    // /**
    //  * @Route("/api/frais", name="api_read_frais", methods ={"GET"})
    //  */
    // public function index(FraisRepository $fraisRepository)
>>>>>>> 8a06bd7bfeb0177b17f0f89be9ee6d35fe55de31

        
        $clients = $clientRepository->findAll();
        $TabClient = [];
         foreach ($clients as $client){
             $TabClient[] = (object)[
                 
                 "societe" => $client->getSociete(),
                 "id" => $client->getId(),
                 
             ];
         }
          return new JsonResponse (["Client" =>$TabClient]);
         
     }

    // /**
    //  * @Route("/apip/clients/{id}", name="api_read_client_frais", methods ={"GET"})
    //  */
    // public function getSociete($id,ClientRepository $clientRepository ){
       
    //     return $this->json($clientRepository->findBy(["client" => $id]));
        
    // }

    
}
