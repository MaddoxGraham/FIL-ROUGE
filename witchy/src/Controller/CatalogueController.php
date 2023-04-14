<?php

namespace App\Controller;

use App\Repository\CategorieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CatalogueController extends AbstractController
{
    #[Route('/', name: 'app_catalogue')]
    public function index(CategorieRepository $categorieRepository): Response
    {
        return $this->render('catalogue/index.html.twig', [
            'categories' => $categorieRepository->findBy([],['id' => 'asc']),
        ]);
    }
    // public function sousCategories(CategorieRepository $categorieRepository):Response
    // {
    //     for ($souscat=1; $souscat  ; $souscat++) { 
    //         # code...
    //     }
    // }


}
