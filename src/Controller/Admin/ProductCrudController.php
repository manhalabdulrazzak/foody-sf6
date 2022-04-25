<?php

namespace App\Controller\Admin;

use App\Entity\Product;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ProductCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
            return Product::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->add('index', 'detail')
            ;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name','name'),
            SlugField::new('slug')->setTargetFieldName('name'),
            ImageField::new('image')
                ->setBasePath('uploads/')
                ->setUploadDir('public/uploads/')
                ->setUploadedFileNamePattern('[randomness].[extension]')
                ->setRequired(false),
            TextField::new('subtitle', 'subtitle'),
            TextareaField::new('description')->hideOnIndex(),
            MoneyField::new('price', 'price')->setCurrency('KWD'),
            AssociationField::new('category', 'category'),
            #AssociationField::new('Attribute', 'Attribute'),
            #AssociationField::new('Addon', 'Addon'),
            BooleanField::new('isInHome', 'Active'),
        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Product')
            ->setEntityLabelInPlural('Product')
        ;
    }

}
