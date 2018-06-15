<?php

namespace App\Controller;

use App\Entity\Artiste;
use App\Form\ArtisteType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Routing\Annotation\Route;

class AddArtisteController extends Controller
{
    /**
     * @Route("/add-artiste", name="add-artiste")
     * @param Request $request
     * @param UserPasswordEncoderInterface $passwordEncoder
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function AddArtisteAction(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
// creates a artiste and gives it some dummy data for this example
        $artiste = new Artiste();
        $form = $this->createForm(ArtisteType::class, $artiste);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $password = $passwordEncoder->encodePassword($artiste, $artiste->getPlainPassword());
            $artiste->setPassword($password);
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $artiste = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($artiste);
            $entityManager->flush();


            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
            // $entityManager = $this->getDoctrine()->getManager();
            // $entityManager->persist($task);
            // $entityManager->flush();

            return $this->redirectToRoute('home');
        }

        return $this->render('Registration/addartiste.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}