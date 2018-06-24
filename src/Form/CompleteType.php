<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class CompleteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('image', FileType::class, array('label' => 'Image(JPG)'))
            ->add('adresse', TextType::class)
            ->add('description',TextareaType::class)
            ->add('projets',TextareaType::class)
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
                )))
            ->add('save', SubmitType::class, array(
                'attr' => array('class' => 'save')));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => User::class,
        ));
    }
}