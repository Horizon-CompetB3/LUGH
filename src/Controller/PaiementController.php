<?php
/**
 * Created by PhpStorm.
 * User: alexa
 * Date: 11/06/2018
 * Time: 23:17
 */

namespace App\Controller;


class PaiementController
{
    public function PaiementPost(){
        \Stripe\Stripe::setApiKey("sk_test_BQokikJOvBiI2HlWgH4olfQ2");

        \Stripe\Charge::create(array(
            "amount" => 200,
            "currency" => "eur",
            "source" => "tok_mastercard", // obtained with Stripe.js
            "description" => "Charge for joshua.thomas@example.com",

        ));
        return $this->render('paiement.html.twig');
    }
}