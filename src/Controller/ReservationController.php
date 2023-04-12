<?php

namespace App\Controller;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Modele;

class ReservationController extends AbstractController
{
    #[Route('/reservation', name: 'app_reservation')]
    public function index(ManagerRegistry $doctrine): Response
    {

        $repoModeles = $doctrine->getRepository(Modele::class);
        $modeles = $repoModeles->findBy(
            array()
        );

        return $this->render('reservation/index.html.twig', [
            'lesModeles' => $modeles,
        ]);
    }
}
