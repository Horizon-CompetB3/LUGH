<?php
/**
 * Created by PhpStorm.
 * User: alexa
 * Date: 18/06/2018
 * Time: 20:36
 */

namespace App\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;

class LoginType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('_username')
            ->add('_password', PasswordType::class)
        ;
    }
}