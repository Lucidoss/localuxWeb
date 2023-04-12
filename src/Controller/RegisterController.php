<?php

namespace App\Controller;

use App\Entity\Client;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RegisterController extends AbstractController
{
    #[Route('/register/{uc}', name: 'app_register')]
    public function inscription(ManagerRegistry $doctrine, $uc): Response
    {
        if($uc == "POST") {
            $client = new Client();

            $name = $_POST['nom'];
            $client->setNOM($name);

            $firstname = $_POST['prenom'];
            $client->setPRENOM($firstname);

            $email = $_POST['email'];
            $client->setEmail($email);

            $phone = $_POST['tel'];
            $client->setEmail($phone);

            $adresse = $_POST['adresse'];
            $client->setEmail($adresse);
            
            $postalcode = $_POST['cp'];
            $client->setCP($postalcode);

            $ville = $_POST['ville'];
            $client->setVILLE($ville);
            
            $mdp = $_POST['mdp'];
            $client->setMDP($mdp);

            $entityManager=$doctrine->getManager();
            $entityManager->persist($client);
            $entityManager->flush();

            return $this->render('accueil/index.html.twig', [
                'controller_name' => 'AccueilController',
            ]);
        
        }
    }
}