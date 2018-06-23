<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Form\ContactType;

class ContactController extends AbstractController
{
/**
* @Route("/contact", name="contact")
*/
public function index()
{
    $form = $this->createForm(ContactType::class);

    return $this->render('content/contact.html.twig', [

        'our_form' => $form->createView(),]);
}
}