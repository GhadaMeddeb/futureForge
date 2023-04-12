<?php

namespace App\Form;

use App\Entity\Offre2;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class Offre2Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('description')
            ->add('reduction')
            ->add('type', ChoiceType::class, [
                'choices' => [
                    'ANNUELLE' => 'ANNUELLE',
                    'SEMESTRIELLE' => 'SEMESTRIELLE',
                    'MENSUELLE' => 'MENSUELLE',
                ],
                'placeholder' => 'Choose type',
            ])
            ->add('dated')
            ->add('datef')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Offre2::class,
        ]);
    }
}
