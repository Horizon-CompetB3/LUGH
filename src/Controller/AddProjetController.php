<?php

namespace App\Controller;

use App\Entity\Projets;
use App\Form\ProjetsType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AddProjetController extends Controller
{
    /**
     * @Route("/addprojets", name="addprojets")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newAction(Request $request)
    {
// creates a projets and gives it some dummy data for this example
        $projets = new Projets();

        $form = $this->createForm(ProjetsType::class, $projets);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $projets = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($projets);
            $entityManager->flush();

            return $this->redirectToRoute('home');
        }

        return $this->render('Registration/addprojet.html.twig', array(
            'form' => $form->createView(),
        ));
    }

}