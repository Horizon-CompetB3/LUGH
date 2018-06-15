<?php

namespace App\Form;

use App\Entity\Entreprise;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class EntrepriseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class)
            ->add('email', EmailType::class)
            ->add('plainPassword', RepeatedType::class, array(
                'type' => PasswordType::class,
                'first_options' => array('label' => 'Password'),
                'second_options' => array('label' => 'Repeat Password'),
            ))
            ->add('adresse', TextType::class)
            ->add('type', ChoiceType::class, array(
                'choices'  => array(
                    'Entreprise Individuelle' => 'Entreprise Individuelle',
                    'TPE' => 'TPE',
                    'PME' => 'PME',
                    'Grande société' => 'Grande société',
                    'Autre...' => 'Autre...',
            )))
            ->add('secteur', ChoiceType::class, array(
            'choices'  => array(
                'Agroalimentaire' => 'Agroalimentaire',
                'Banque / Assurance' => 'Banque / Assurance',
                'Bois / Papier / Carton / Imprimerie' => 'Bois / Papier / Carton / Imprimerie',
                'BTP / Matériaux de construction' => 'BTP / Matériaux de construction',
                'Chimie / Parachimie' => 'Chimie / Parachimie',
                'Commerce / Négoce / Distribution' => 'Commerce / Négoce / Distribution',
                'Édition / Communication / Multimédia' => 'Édition / Communication / Multimédia',
                'Électronique / Électricité' => 'Électronique / Électricité',
                'Études et conseils' => 'Études et conseils',
                'Industrie pharmaceutique' => 'Industrie pharmaceutique',
                'Informatique / Télécoms' => 'Informatique / Télécoms',
                'Machines et équipements / Automobile' => 'Machines et équipements / Automobile',
                'Métallurgie / Travail du métal' => 'Métallurgie / Travail du métal',
                'Plastique / Caoutchouc' => 'Plastique / Caoutchouc',
                'Services aux entreprises' => 'Services aux entreprises',
                'Textile / Habillement / Chaussure' => 'Textile / Habillement / Chaussure',
                'Transports / Logistique' => 'Transports / Logistique',
                'Autre...' => 'Autre...',
            )));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Entreprise::class,
        ));
    }
}