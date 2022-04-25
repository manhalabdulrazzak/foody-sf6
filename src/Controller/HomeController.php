<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(ProductRepository $productRepository): Response
    {
        $products = $productRepository->findByIsInHome(1);
        return $this->render('home/index.html.twig', [
            'carousel' => true,
            'top_products' => $products,
        ]);
    }

    #[Route('about', name: 'about')]
    public function about(): Response
    {
        return $this->render('home/about.html.twig');
    }
}
