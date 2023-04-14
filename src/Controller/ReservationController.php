<?php

namespace App\Controller;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Locationsanschauffeur;
use App\Entity\Modele;

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
        $location = new Locationsanschauffeur();

        //$idClient = $_POST['immatricule'];
        //$location->setIdclient($idClient);

        //$nbKmDepart = $_POST['nb'];
        //$location->setNbkmdepart($nbKmDepart);

        $currentDate = strtotime("now");
        dd($currentDate);
        // $location->setDateLocation();

        //$location->setMontantRegle();

        $dateDepart = $_POST['dateDepart'];
        $location->setDateHreDepartPrevu($dateDepart);
        
        $dateRetour = $_POST['dateRetour'];
        $location->setDateHreRetourPrevu($dateRetour);

        $entityManager=$doctrine->getManager();
        $entityManager->persist($location);
        $entityManager->flush();

        return $this->render('accueil/index.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
        
    }
}
