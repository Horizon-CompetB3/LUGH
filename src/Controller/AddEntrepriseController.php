<?php

namespace App\Controller;

use App\Entity\Entreprise;
use App\Form\EntrepriseType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Routing\Annotation\Route;

class AddEntrepriseController extends Controller
{
    /**
     * @Route("/add-entreprise", name="add-entreprise")
     * @param Request $request
     * @param UserPasswordEncoderInterface $passwordEncoder
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function AddEntrepriseAction(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
// creates a artiste and gives it some dummy data for this example
        $entreprise = new Entreprise();
        $form = $this->createForm(EntrepriseType::class, $entreprise);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $password = $passwordEncoder->encodePassword($entreprise, $entreprise->getPlainPassword());
            $entreprise->setPassword($password);
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $entreprise = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($entreprise);
            $entityManager->flush();


            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
            // $entityManager = $this->getDoctrine()->getManager();
            // $entityManager->persist($task);
            // $entityManager->flush();

            return $this->redirectToRoute('home');
        }

        return $this->render('Registration/addentreprise.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}