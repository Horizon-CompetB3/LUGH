<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class EntrepriseController extends Controller
{
    /**
     * @Route("/entreprise", name="entreprise")
     */
    public function index()
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/EntrepriseController.php',
        ]);
    }
}
