<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Repository\ProduitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response ;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/products', name:'app_products_')]
class ProductsController extends AbstractController{

    #[Route('/', name:'index')]
    public function index(ProduitRepository $produitRepository): Response
    {
        return $this->render('products/index.html.twig',[
            'produits' => $produitRepository->findBy([],['id' => 'asc']),
        ]);
    }

    #[Route('/{slug}', name: 'details')]
    public function details(Produit $produit,ProduitRepository $produitRepository): Response{
        $categoriesProduit = $produitRepository->findBy(['categorie' => $produit->getCategorie()]);
    return $this->render('products/details.html.twig', compact('produit', 'categoriesProduit'));
    }
}