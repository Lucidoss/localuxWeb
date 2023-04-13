<?php

namespace App\Controller;

use App\Entity\Modele;
use App\Entity\FormuleSansChauffeur;
use App\Entity\Vehicule;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ChoixreservationController extends AbstractController
{
    #[Route('/choixreservation/{id}', name: 'app_choixreservation')]
    public function index(ManagerRegistry $doctrine, $id): Response
    {

        $repoModele = $doctrine->getRepository(Modele::class);
        $leModele = $repoModele->find($id);

        // $repoFormules = $doctrine->getRepository(FormuleSansChauffeur::class);
        // $formules = $repoFormules->findBy(
        //     array() 
        // );

        // $repoVehicule = $doctrine->getRepository(Vehicule::class);
        // $vehicules = $repoVehicule->findBy(
        //     array() 
        // );

        return $this->render('choixreservation/index.html.twig', [
            "Modele" => $leModele,
        ]);
    }
}
