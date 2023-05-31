<?php

namespace App\Form;

use App\Entity\Films;
use App\Entity\Formats;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\All;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\Image;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class FilmsFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Titre')
            ->add('Realisation')
            ->add('Scenario')
            ->add(
                'Format',
                EntityType::class,
                [
                    'class' => Formats::class,
                    'choice_label' => 'name'
                ]
            )
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
            ->add('Etalonnage')
            ->add('images', FileType::class, [
                'label' => false,
                'multiple' => true,
                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new All(
                        new Image([
                            'maxWidth' => 1280,
                            'maxWidthMessage' => 'L\'image doit faire {{ max_width }} pixels de large au maximum'
                        ])
                    )
                ]
            ]);;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Films::class,
        ]);
    }
}
