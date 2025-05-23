<?php
// src/Controller/EtudiantsController.php
namespace App\Controller;

use App\Model\Etudiants; // à adapter selon ta structure (Model => Service)
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EtudiantsController extends AbstractController
{
    private Etudiants $etudiants;

    public function __construct(Etudiants $etudiants)
    {
        $this->etudiants = $etudiants;
    }

    #[Route('/etudiants', name: 'etudiants_index', methods: ['GET'])]
    public function index(): Response
    {
        $etudiants = $this->etudiants->getEtudiants();

        return $this->render('etudiants/index.html.twig', [
            'etudiants' => $etudiants,
        ]);
    }

    #[Route('/etudiants/professeur/{id}', name: 'etudiants_by_professeur', methods: ['GET'])]
    public function getEtudiantsByProfesseur(int $id): Response
    {
        $etudiants = $this->etudiants->getEtudiantsByProfesseur($id);

        return $this->render('etudiants/index.html.twig', [
            'etudiants' => $etudiants,
        ]);
    }

    #[Route('/etudiants/search/{prompt}', name: 'etudiants_search', methods: ['GET'])]
    public function search(string $prompt): Response
    {
        $etudiants = $this->etudiants->search($prompt);

        return $this->render('etudiants/index.html.twig', [
            'etudiants' => $etudiants,
        ]);
    }
}
