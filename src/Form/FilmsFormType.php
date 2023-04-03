<?php

namespace App\Form;

use App\Entity\Films;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FilmsFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Titre')
            ->add('Réalisation')
            ->add('Scénario')
            ->add('Format')
            ->add('Année')
            ->add('Durée')
            ->add('Synopsis')
            ->add('Coproduction')
            ->add('Soutiens')
            ->add('Distribution')
            ->add('Diffusion')
            ->add('Sélections')
            ->add('Avec')
            ->add('Image')
            ->add('Son')
            ->add('Montage')
            ->add('Musique')
            ->add('Direction')
            ->add('Régie')
            ->add('Décors')
            ->add('Costumes')
            ->add('Etalonnage')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Films::class,
        ]);
    }
}
