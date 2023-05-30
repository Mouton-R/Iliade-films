<?php

namespace App\Form;

use App\Entity\Films;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FilmsFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Titre')
            ->add('Realisation')
            ->add('Scenario')
            // ->add(
            //     'Format'
            //     // , EntityType::class, [
            //     //     'class' => Formats::class,
            //     //     'choice_label' => 'name'
            //     // ]
            // )
            ->add('Annee')
            ->add('Duree')
            ->add('Synopsis')
            ->add('Coproduction')
            ->add('Soutiens')
            ->add('Distribution')
            ->add('Diffusion')
            ->add('Selections')
            ->add('Avec')
            ->add('Image')
            ->add('Son')
            ->add('Montage')
            ->add('Musique')
            ->add('Direction')
            ->add('Regie')
            ->add('Decors')
            ->add('Costumes')
            ->add('Etalonnage');
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Films::class,
        ]);
    }
}
