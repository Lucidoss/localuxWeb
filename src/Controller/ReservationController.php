<?php

namespace App\Controller;

use App\Entity\Location;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Locationsanschauffeur;
use App\Entity\Modele;
use App\Entity\Vehicule;
use App\Repository\LocationsanschauffeurRepository;
use DateTime;

class ReservationController extends AbstractController
{
    #[Route('/reservation', name: 'app_reservation')]
    public function inscription(ManagerRegistry $doctrine): Response
    {
        $repoModele = $doctrine->getRepository(Modele::class);
        $modeles=[];
        foreach ($repoModele->findAll() as $modele) {
            $modeles[] = $modele;
        }

        return $this->render('reservation/index.html.twig', [
            "lesModeles" => $modeles,
        ]);
    }

    #[Route('/reservation/post', name: 'app_reservationPOST')]
    public function inscriptionPOST(ManagerRegistry $doctrine): Response
    {
        $locationSansChauffeur = new Locationsanschauffeur();
        $location = new Location();

        $idModele = $_POST['idModele'];
        $idClient = $this->getUser()->getid();

        $locationSansChauffeur->setIdclient($idClient);
        $location->setIdclient($idClient);

        $repoVehicule = $doctrine->getRepository(Vehicule::class);
        $location->setImmatriculation($repoVehicule->findOneBy(["id"=>$idModele])->getImmatriculation());

        $locationSansChauffeur->setMontantregle('40');
        $location->setMontantregle('40');

        $locationSansChauffeur->setNbkmdepart('500');

        $currentDate = new DateTime('now');
        $locationSansChauffeur->setDateLocation($currentDate);
        $location->setDateLocation($currentDate);

        $dateDepart = new DateTime($_POST['dateDepart']);
        $locationSansChauffeur->setDateHreDepartPrevu($dateDepart);
        $location->setDateHreDepartPrevu($dateDepart);
        
        $dateRetour = new DateTime($_POST['dateRetour']);
        $locationSansChauffeur->setDateHreRetourPrevu($dateRetour);
        $location->setDateHreRetourPrevu($dateRetour);


        $entityManager=$doctrine->getManager();
        $entityManager->persist($locationSansChauffeur);
        $entityManager->persist($location);
        $entityManager->flush();

        return $this->render('accueil/index.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
        
    }
}
