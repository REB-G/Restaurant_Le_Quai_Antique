<?php

namespace App\Form;

use App\Entity\HomePage;
use App\Entity\FamousDishes;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class FamousDishesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'row_attr' => [
                    'class' => 'famous-dishes-form__field'
                ],
                'label' => 'Nom du plat',
                'label_attr' => [
                    'class' => 'famous-dishes-form__field--label'
                ],
                'attr' => [
                    'class' => 'famous-dishes-form__field--input',
                ]
            ])
            ->add('description', TextareaType::class, [
                'row_attr' => [
                    'class' => 'famous-dishes-form__field'
                ],
                'label' => 'Description du plat',
                'label_attr' => [
                    'class' => 'famous-dishes-form__field--label'
                ],
                'attr' => [
                    'class' => 'famous-dishes-form__field--input',
                ]
            ])
            ->add('imageFile', FileType::class, [
                'row_attr' => [
                    'class' => 'famous-dishes-form__field'
                ],
                'label' => 'Image du plat',
                'label_attr' => [
                    'class' => 'famous-dishes-form__field--label'
                ],
                'attr' => [
                    'class' => 'famous-dishes-form__field--input-file',
                ],
                'required' => false,
                'mapped' => false,
            ])
            ->add('imageName', TextType::class, [
                'row_attr' => [
                    'class' => 'famous-dishes-form__field'
                ],
                'label' => 'Nom de l\'image du plat',
                'label_attr' => [
                    'class' => 'famous-dishes-form__field--label'
                ],
                'attr' => [
                    'class' => 'famous-dishes-form__field--input-file',
                ]
                ])
            ->add('homePage', EntityType::class, [
                'class' => HomePage::class,
                'row_attr' => [
                    'class' => 'famous-dishes-form__field'
                ],
                'label' => 'Nom de la page d\'accueil',
                'label_attr' => [
                    'class' => 'famous-dishes-form__field--label'
                ],
                'attr' => [
                    'class' => 'famous-dishes-form__field--input',
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => FamousDishes::class,
        ]);
    }
}
