<?php

namespace App\Controller;

use App\Entity\Produit;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response ;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/products', name:'app_products_')]
class ProductsController extends AbstractController{

    #[Route('/', name:'index')]
    public function index(): Response
    {
        return $this->render('products/index.html.twig');
    }

    #[Route('/{slug}', name: 'details')]
    public function details(Produit $produit): Response{
        return $this->render('products/details.html.twig', compact('produit'));
    }
}