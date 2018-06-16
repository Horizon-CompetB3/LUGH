<?php

namespace App\Controller;

use App\Repository\ArtisteRepository;
use App\Repository\ProjetsRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    /**
     * @Route("/", name="home")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function homePost()
    {



        return $this->render('home.html.twig');
    }
}

