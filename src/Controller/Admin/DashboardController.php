<?php

namespace App\Controller\Admin;

use App\Entity\Addon;
use App\Entity\Attribute;
use App\Entity\Carrier;
use App\Entity\Category;
use App\Entity\Headers;
use App\Entity\Order;
use App\Entity\Product;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    public function __construct(
        private AdminUrlGenerator $adminUrlGenerator
    ) {
    }

    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $url = $this->adminUrlGenerator
            ->setController(ProductCrudController::class)
            ->generateUrl();

        return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setFaviconPath(path:'public/assets/ico.png' )
            ->setTitle('Food App');

    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::section('Admin Panel');


        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToRoute('View website', 'fas fa-globe', 'home');

        yield MenuItem::section('Products');

        yield MenuItem::subMenu('Products', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Create Product', 'fas fa-plus', Product::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Show Product', 'fas fa-eye', Product::class),
            MenuItem::linkToCrud('Addon', 'fas fa-plus-circle', Addon::class),
            MenuItem::linkToCrud('Attribute', 'fas fa-stroopwafel', Attribute::class)
        ]);
        yield MenuItem::section('Categories');
        yield MenuItem::subMenu('Category', 'fas fa-list')->setSubItems([
            MenuItem::linkToCrud('Create Category', 'fas fa-plus', Category::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Show Categories', 'fas fa-eye', Category::class)
        ]);
        yield MenuItem::section('Orders');
        yield MenuItem::subMenu('Orders', 'fas fa-shopping-basket')->setSubItems([
            MenuItem::linkToCrud('Create Order', 'fas fa-plus', Order::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Show Orders', 'fas fa-eye', Order::class)
        ]);
        yield MenuItem::section('Users');
        yield MenuItem::subMenu('User', 'fas fa-users')->setSubItems([
            MenuItem::linkToCrud('Create User', 'fas fa-plus', User::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Show User', 'fas fa-eye', User::class)
        ]);
        yield MenuItem::linkToCrud('Kitchen', 'fas fa-utensils', Carrier::class);
        yield MenuItem::linkToCrud('Headers', 'fas fa-desktop', Headers::class);


    }
}
