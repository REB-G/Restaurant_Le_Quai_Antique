<?php

namespace App\Controller\Admin;

use App\Entity\FamousDishes;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use Vich\UploaderBundle\Form\Type\VichImageType;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class FamousDishesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return FamousDishes::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Famous Dishes')
            ->setEntityLabelInPlural('Famous Dishes')
            ->setSearchFields(['id', 'title', 'description'])
            ->setDefaultSort(['id' => 'DESC']);
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
                ->hideOnForm(),
            TextField::new('name', 'Nom du plat'),
            TextareaField::new('description', 'Description du plat'),
            TextField::new('imageFile', 'Image')
                ->setFormType(VichImageType::class),
            AssociationField::new('homePage', 'Page d\'accueil')
        ];
    }
    
}
