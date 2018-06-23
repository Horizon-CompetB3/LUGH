<?php

namespace App\Controller;

use App\Entity\Artiste;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProfilController extends Controller
{
    /**
     * @Route("/profil", name="profil")
     */
    public function profile()
    {



        return $this->render('Content/profil.html.twig', [
            'controller_name' => 'ProfilController',
        ]);
    }

    public function completprofil()
    {

    }









}