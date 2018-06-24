<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\UserType;
use App\Form\CompleteType;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AddUserController extends Controller
{
    /**
     * @Route("/add-user", name="add-user")
     * @param Request $request
     * @param UserPasswordEncoderInterface $passwordEncoder
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function AddUserAction (Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
// creates a user and gives it some dummy data for this example
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $password = $passwordEncoder->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($password);
            $user = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('login');
        }

        return $this->render('log/registration.html.twig', array(
            'controller_name' => 'AddUserController',
            'form' => $form->createView(),

        ));
    }

    /**
     * @Route("/complete-profil", name="complete-profil")
     * @param Request $request
     * @var User $user
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function CompleteProfilAction(Request $request)
    {
// creates a projets and gives it some dummy data for this example
        $user = $this->getDoctrine()->getRepository(User::class);
        $form = $this->createForm(CompleteType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $user = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('home');
        }

        return $this->render('Registration/addprojet.html.twig', array(
            'form' => $form->createView(),
        ));
    }}