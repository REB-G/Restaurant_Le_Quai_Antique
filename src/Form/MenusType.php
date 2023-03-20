<?php

namespace App\Form;

use App\Entity\Menus;
use App\Entity\Dishes;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class MenusType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'row_attr' => [
                    'class' => 'menus-form__field'
                ],
                'label' => 'Titre du menu',
                'label_attr' => [
                    'class' => 'menus-form__field--label'
                ],
                'attr' => [
                    'class' => 'menus-form__field--input',
                ]
            ])
            ->add('description', TextareaType::class, [
                'row_attr' => [
                    'class' => 'menus-form__field'
                ],
                'label' => 'Description du menu',
                'label_attr' => [
                    'class' => 'menus-form__field--label'
                ],
                'attr' => [
                    'class' => 'menus-form__field--input',
                ]
            ])
            ->add('price', IntegerType::class, [
                'row_attr' => [
                    'class' => 'menus-form__field'
                ],
                'label' => 'Prix du menu',
                'label_attr' => [
                    'class' => 'menus-form__field--label'
                ],
                'attr' => [
                    'class' => 'menus-form__field--input',
                ]
            ])
            ->add('dish', EntityType::class, [
                'class' => Dishes::class,
                'choice_label' => 'name',
                'expanded' => true,
                'multiple' => true,
                'row_attr' => [
                    'class' => 'menus-form__field'
                ],
                'label' => 'Plats du menu',
                'label_attr' => [
                    'class' => 'menus-form__field--label'
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Menus::class,
        ]);
    }
}
