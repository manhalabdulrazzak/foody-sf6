<?php

namespace App\Controller\Admin;

use App\Entity\Addon;
use App\Entity\Product;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class AddonCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Addon::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name','name'),
            MoneyField::new('price', 'price')->setCurrency('KWD'),

        ];
    }

}
