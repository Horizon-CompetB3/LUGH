<?php

namespace App\Controller;

use App\Form\projetsType;
use App\Entity\projets;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\projetsPasswordEncoderInterface;

class RegistrationController extends Controller
{
    /**
     * @Route("/register", name="add_projets")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function registerAction(Request $request)
    {
// 1) build the form
        $projets = new projets();
        $form = $this->createForm(projetsType::class, $projets);
// 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
// 4) save the projets!
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($projets);
            $entityManager->flush();
// ... do any other work - like sending them an email, etc
            //$message = (new \Swift_Message('Confirmation de compte'))
                //->setFrom(['jolesport.iesa@gmail.com' => 'JolE-sport'])
                //->setBody('Votre compte JolE-sport a bien été créé !');
           // $mailer->send($message);
            return $this->redirectToRoute('home');
        }
        return $this->render(
            'Registration/addprojets.html.twig',
            array('form' => $form->createView())
        );
    }
}
