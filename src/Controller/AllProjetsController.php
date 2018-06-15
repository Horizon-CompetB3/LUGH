<?php

namespace App\Controller;

use App\Repository\ProjetsRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AllProjetsController extends Controller
{
    /**
     * @Route("/all-projets", name="all-projets")
     */
    public function AllProjets (ProjetsRepository $projetsRepository)
    {
        $projets = $projetsRepository->findAll();

        return $this->render('Content/allprojets.html.twig', [
            'controller_name' => 'AllProjetsController',
            'projets' => $projets
        ]);
    }
}