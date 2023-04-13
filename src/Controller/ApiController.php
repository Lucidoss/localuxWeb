<?php

namespace App\Controller;

use App\Entity\Destination;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ApiController extends AbstractController
{
    #[Route('/api/destinations', name:'app_apiLesDestinations', methods:['GET'])]
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

    #[Route('/api/destinations/{id}', name: 'app_apiUneDestination', methods: ['GET'])]
    public function apiUneDestination($id,  ManagerRegistry $doctrine): JsonResponse
    {
        //On recherche un hackathon via l'id de l'url parmis tout les hackathons
        $repository = $doctrine->getRepository(Destination::class);
        $laDestination = $repository->findOneBy(['id' => $id]);

        // On créé et remplit un tableau pour le hackathon
        $tableauDestination=[];
        $tableauDestination[]=[
            'id'=>$laDestination->getId(),
            'libelle'=>$laDestination->getlibelle(),
        ];
        
        return new JsonResponse($tableauDestination, 200, ['Access-Control-Allow-Origin'=>'*']);
    }
}
