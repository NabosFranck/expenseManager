<?php

namespace App\Controller;

use DateTime;
use App\Entity\Frais;
use App\Repository\FraisRepository;
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
     * @Route("/api/commercial/frais/{id}", name="api_read_frais_com", methods ={"GET"})
     */
    public function getComFrais($id,FraisRepository $fraisRepository ){
       
        return $this->json($fraisRepository->findBy(["commercial" => $id]));
        
    }






    // /**
    //  * @Route("/api/frais", name="api_read_frais", methods ={"GET"})
    //  */
    // public function index(FraisRepository $fraisRepository)

    // {
    //     // dd($fraisRepository);
    //      return $this->json($fraisRepository->findAll() ,200 ,[] ,['groups'=>'frais:read']);
        
    // }
    
    // /**
    //  * @Route("/api/frais", name="api_post_frais", methods ={"POST"})
    //  */
    // public function create(Request $request, SerializerInterface $serializer, EntityManagerInterface $em, ValidatorInterface $validator ){
    //     $jsonRecu = $request->getContent();
    //     try {$frais = $serializer->deserialize($jsonRecu, Frais::class, 'json');
    //         $frais->setCreatedAt(new \DateTime());

    //         $errors = $validator->validate($frais);

    //         if(count($errors )>0){
    //             return $this->json($errors,'400');
    //         };

    //         $em->persist($frais);
    //         $em->flush();
    //         return $this->json($frais, 201, [],['groups'=>'frais:read']);
    //     }

    //     catch(NotEncodableValueException $e){

    //         return $this->json([
    //             'status'=> 400,
    //             'message' => $e->getMessage()
    //         ],400);
    //     }
        
    // }
}
