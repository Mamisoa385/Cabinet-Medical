<?php
// src/Controller/ProfesseursController.php
namespace App\Controller;

use App\Model\Professeurs; // idem, adapte si nécessaire
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfesseursController extends AbstractController
{
    private Professeurs $professeurs;

    public function __construct(Professeurs $professeurs)
    {
        $this->professeurs = $professeurs;
    }

    #[Route('/professeurs', name: 'professeurs_index', methods: ['GET'])]
    public function index(): Response
    {
        $professeurs = $this->professeurs->getProfesseurs();

        return $this->render('professeurs/index.html.twig', [
            'professeurs' => $professeurs,
        ]);
    }

    #[Route('/professeurs/search/{prompt}', name: 'professeurs_search', methods: ['GET'])]
    public function search(string $prompt): Response
    {
        $professeurs = $this->professeurs->search($prompt);

        return $this->render('professeurs/index.html.twig', [
            'professeurs' => $professeurs,
        ]);
    }
}
