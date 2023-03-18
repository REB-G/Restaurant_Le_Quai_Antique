<?php

namespace App\Form;

use App\Entity\HomePage;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HomePageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('pageTitle')
            ->add('welcomeText')
            ->add('aboutTitle')
            ->add('aboutText')
            ->add('sectionDishesTitle')
            ->add('sectionDishesText')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => HomePage::class,
        ]);
    }
}
