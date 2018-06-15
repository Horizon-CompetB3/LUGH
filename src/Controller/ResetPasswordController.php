<?php
/**
 * Created by PhpStorm.
 * User: alexandresmagghe
 * Date: 29/03/2018
 * Time: 12:09
 */

namespace App\Controller;
use App\Entity\Artiste;
use App\Entity\Entreprise;
use App\Form\ForgotPassword;
use App\Form\PasswordResetType;
use Swift_Mailer;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Swift_Message;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;


class ResetPasswordController extends Controller
{

    /**
     * @Route("/emailcheck", name="forgotpassword")
     * @param Request $request
     * @param Swift_Mailer $mailer
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function forgotpasswordArtiste(Request $request, Swift_Mailer $mailer)
    {
        $form = $this->createForm(ForgotPassword::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $email = $form->get('email')->getData();
            $artiste = $this->getDoctrine()->getRepository(Artiste::class)->findOneBy(['email' => $email]);
            if(!$artiste){
                return $this->render('forgotpass/emailcheck.html.twig', [
                    'form' => $form->createView(),
                    'invalid_email' => $email,
                ]);
            }
            $token = uniqid('bde-', true);
            $url = $this->generateUrl('login', [
                'token' => $token,
            ], UrlGeneratorInterface::ABSOLUTE_URL);
            $mailBody =  'Pour reset ton password click ici : ' . $url;
            $message = (new Swift_Message('Nouveau mot de passe'))
                ->setFrom(['alex.s95120@gmail.com' => 'Lugh'])
                ->setTo('alex.s95120@gmail.com')
                ->setBody($mailBody);
            $mailer->send($message);
            $artiste->setResetPasswordToken($token);
            $this->getDoctrine()->getManager()->persist($artiste);
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', 'Coucou');
            return $this->redirectToRoute('login');
        }
        return $this->render('forgotpass/emailcheck.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    public function forgotpasswordEntreprise(Request $request, Swift_Mailer $mailer)
    {
        $form = $this->createForm(ForgotPassword::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $email = $form->get('email')->getData();
            $entreprise = $this->getDoctrine()->getRepository(Entreprise::class)->findOneBy(['email' => $email]);
            if(!$entreprise){
                return $this->render('forgotpass/emailcheck.html.twig', [
                    'form' => $form->createView(),
                    'invalid_email' => $email,
                ]);
            }
            $token = uniqid('bde-', true);
            $url = $this->generateUrl('login', [
                'token' => $token,
            ], UrlGeneratorInterface::ABSOLUTE_URL);
            $mailBody =  'Pour reset ton password click ici : ' . $url;
            $message = (new Swift_Message('Nouveau mot de passe'))
                ->setFrom(['alex.s95120@gmail.com' => 'Lugh'])
                ->setTo('alex.s95120@gmail.com')
                ->setBody($mailBody);
            $mailer->send($message);
            $entreprise->setResetPasswordToken($token);
            $this->getDoctrine()->getManager()->persist($entreprise);
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', 'Coucou');
            return $this->redirectToRoute('login');
        }
        return $this->render('forgotpass/emailcheck.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    public function changepasswordArtiste(Request $request, string $token, EncoderFactoryInterface $factory)
    {
        /** @var Artiste $artiste */
        $artiste = $this->getDoctrine()->getRepository(Artiste::class)->findOneBy(['resetPasswordToken' => $token]);
        if (!$artiste) {
            $this->addFlash('error', 'tu es mauvais');
            return $this->redirectToRoute('login');
        }
        // user form update
        $form = $this->createForm(PasswordResetType::class, $artiste);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $encoder = $factory->getEncoder(Artiste::class);
            $artiste->setPassword($encoder->encodePassword($artiste->getPlainPassword(), $artiste->getSalt()));
            $artiste->eraseCredentials();
            $artiste->setResetPasswordToken(null);
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', 'Bien ouej Nadeige');
            return $this->redirectToRoute('login');
        }
        return $this->render('forgotpass/changepassword.html.twig', [
            'form' => $form->createView(),
        ]);

    }
    public function changepasswordEntreprise(Request $request, string $token, EncoderFactoryInterface $factory)
    {
        /** @var Entreprise $artiste */
        $entreprise = $this->getDoctrine()->getRepository(Entreprise::class)->findOneBy(['resetPasswordToken' => $token]);
        if (!$entreprise) {
            $this->addFlash('error', 'tu es mauvais');
            return $this->redirectToRoute('login');
        }
        // user form update
        $form = $this->createForm(PasswordResetType::class, $entreprise);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $encoder = $factory->getEncoder(Artiste::class);
            $entreprise->setPassword($encoder->encodePassword($entreprise->getPlainPassword(), $entreprise->getSalt()));
            $entreprise->eraseCredentials();
            $entreprise->setResetPasswordToken(null);
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', 'Bien ouej Nadeige');
            return $this->redirectToRoute('login');
        }
        return $this->render('forgotpass/changepassword.html.twig', [
            'form' => $form->createView(),
        ]);

    }
}