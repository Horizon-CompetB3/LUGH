<?php

namespace App\Form;

use App\Entity\Projets;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class ProjetsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

        ->add('name', TextType::class)
            ->add('type', ChoiceType::class, array(
                'choices'  => array(
                    'Céramique' => 'Céramique',
                    'Plastique' => 'Plastique',
                    'Peinture' => 'Peinture',
                )))
            ->add('theme', ChoiceType::class, array(
                'choices'  => array(
                    'Art' => 'Art',
                    'Michou' => 'Michou',
                    'Jambon' => 'Jambon',
                )))

            ->add('orientation', ChoiceType::class, array(
                'choices'  => array(
                    'Paysage' => 'Paysage',
                    'Portrait' => 'Portrait',
                )))
        ->add('description', TextType::class)
        ->add('budget', IntegerType::class)
        ->add('largeur', IntegerType::class)
        ->add('hauteur', IntegerType::class)
        ->add('profondeur', IntegerType::class)
        ->add('image', FileType::class, array('label' => 'Image(JPG)'))
        ->add('save', SubmitType::class, array('label' => 'Create projets'))
        ->getForm();
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Projets::class,
        ));
    }
}