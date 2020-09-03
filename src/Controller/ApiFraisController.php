<?php

namespace App\Controller;

use App\Repository\FraisRepository;
use App\Repository\CommercialRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ApiFraisController extends AbstractController
{
    /**
     * @Route("/api/frais", name="api_frais", methods ={"GET"})
     */
    public function index(FraisRepository $frais)
    {
        
    }
}
