<?php

namespace App\Controller\Admin;

use App\Entity\Attribute;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class AttributeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Attribute::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name'),
            BooleanField::new('status', 'Active')
        ];
    }

}
