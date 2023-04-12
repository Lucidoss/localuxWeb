<?php

namespace App\Controller;

use App\Entity\Destination;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ApiController extends AbstractController
{
    #[Route('/api/destination', name:'app_apiLesDestinations', methods:['GET'])]
    public function apiLesDestinations(ManagerRegistry $doctrine): JsonResponse
    {
        $repository = $doctrine->getRepository(Destination::class);
        $lesDestinations = $repository->findAll();
        $tabDestinations=[];
        foreach($lesDestinations as $laDestination) {
            $tabDestinations[]=[
                'id'=>$laDestination->getId(),
                'libelle'=>$laDestination->getlibelle(),
            ];
        }
        return new JsonResponse($tabDestinations, 200, ['Access-Control-Allow-Origin'=>'*']);
    }
}
