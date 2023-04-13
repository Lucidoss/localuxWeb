<?php

namespace App\Controller;

use App\Entity\Client;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RegisterController extends AbstractController
{
    #[Route('/register', name: 'app_register')]
    public function inscription(ManagerRegistry $doctrine): Response
    {
        return $this->render('inscription/index.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
    }
    #[Route('/register/post', name: 'app_registerPOST')]
    public function inscriptionPOST(ManagerRegistry $doctrine): Response
    {
        $client = new Client();

        $name = $_POST['name'];
        $client->setNOM($name);

        $firstname = $_POST['firstname'];
        $client->setPRENOM($firstname);

        $email = $_POST['email'];
        $client->setEmail($email);

        $phone = $_POST['phone'];
        $client->setTel($phone);

        $adresse = $_POST['adresse'];
        $client->setAdresse($adresse);
        
        $postalcode = $_POST['postalcode'];
        $client->setCP($postalcode);

        $ville = $_POST['city'];
        $client->setVILLE($ville);
        
        $mdp = $_POST['password'];
        $client->setMDP($mdp);

        $entityManager=$doctrine->getManager();
        $entityManager->persist($client);
        $entityManager->flush();

        return $this->render('accueil/index.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
        
    }
}