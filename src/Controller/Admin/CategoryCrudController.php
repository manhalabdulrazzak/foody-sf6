<?php

namespace App\Controller\Admin;

use App\Entity\Category;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CategoryCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Category::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Category')
            ->setEntityLabelInPlural('Category')
        ;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name', 'name'),
            ImageField::new('image', 'Category image')
                ->setBasePath('uploads/Category')
                ->setUploadDir('public/uploads/Category')
                ->setUploadedFileNamePattern('[randomness].[extension]')
                ->setRequired(false),
            BooleanField::new('Active', 'Active'),
        ];
    }
}
