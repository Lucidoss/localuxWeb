<?php

namespace App\Controller;

use App\Entity\Destination;
use App\Entity\Modele;
use App\Entity\Vehicule;
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
        $repository = $doctrine->getRepository(Destination::class);
        $laDestination = $repository->findOneBy(['id' => $id]);

        $tableauDestination=[];
        $tableauDestination[]=[
            'id'=>$laDestination->getId(),
            'libelle'=>$laDestination->getlibelle(),
        ];
        
        return new JsonResponse($tableauDestination, 200, ['Access-Control-Allow-Origin'=>'*']);
    }

    #[Route('/api/vehicule', name:'app_apiVehicule', methods:['GET'])]
    public function apiVehicule(ManagerRegistry $doctrine): JsonResponse
    {
        $repositoryVehi = $doctrine->getRepository(Vehicule::class);
        $repositoryModele = $doctrine->getRepository(Modele::class);
        $lesVehicules = $repositoryVehi->findAll();
        $tabVehicules=[];
        foreach($lesVehicules as $leVehicules) {
            $modele = $repositoryModele->findBy(['id'=>$leVehicules->getId()]);
            $tabVehicules[]=[
                'immatriculation'=>$leVehicules->getImmatriculation(),
                'idModele'=>$leVehicules->getId(),
                'modele'=>$modele[0]->getNom()
            ];
        }
        return new JsonResponse($tabVehicules, 200, ['Access-Control-Allow-Origin'=>'*']);
    }

    #[Route('/api/reserver', name:'app_apiReserver', methods:['GET'])]
    public function apiReserver(ManagerRegistry $doctrine)
    {
        
    }
}
