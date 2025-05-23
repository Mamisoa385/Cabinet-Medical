<?php
// src/Controller/HomeController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]  // route pour la racine "/"
    public function index(): Response
    {
        // on peut passer des variables au template ici si besoin
        return $this->render('home/index.html.twig', [
            'message' => 'Bienvenue dans votre app Symfony !',
        ]);
    }
}
