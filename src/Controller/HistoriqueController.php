<?php

namespace App\Controller;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HistoriqueController extends AbstractController
{
    #[Route('/historique', name: 'app_historique')]
    public function index(ManagerRegistry $doctrine): Response
    {
        return $this->render('historique/index.html.twig', [
        ]);
    }
}
