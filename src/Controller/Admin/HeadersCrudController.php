<?php

namespace App\Controller\Admin;

use App\Entity\Headers;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class HeadersCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Headers::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Header')
            ->setEntityLabelInPlural('Header')
            ->setDefaultSort(['id' => 'DESC'])
        ;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title', 'title'),
            TextareaField::new('content', 'content'),
            TextField::new('btnTitle', 'btnTitle'),
            TextField::new('btnUrl', 'btnUrl'),
            ImageField::new('image')
                ->setBasePath('uploads/')
                ->setUploadDir('public/uploads/')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
        ];
    }

}
