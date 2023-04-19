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
        $siblingsData = array(
            array(
                'title' => 'WOMEN',
                'color' => '#ff2003',
                'html' => '<div class="col-md-6 my-auto demoUnderCatImg">
                                <div>
                                    <img class="img-fluid" src="https://i.pinimg.com/564x/2d/13/e1/2d13e1c0976b4428cd90c2dff78f27fd.jpg" alt="Tag you\'re in">
                                </div>
                                <p class="px-app gitchyMenu px-glitch">
                                    <span class="px-glitchtext px-glitchtext-anim">大きな悪いオオカミはどこですか</span>
                                </p>
                                <div>
                                    <img class="img-fluid" src="https://i.pinimg.com/736x/df/a6/74/dfa67443b017ed999a78b156ed67140b.jpg" alt="where is the Big Bad Wolf ? ">
                                </div>
                            </div>',
                'subcategories' => array(
                    array('title' => 'Dress'),
                    array('title' => 'Top'),
                    array('title' => 'Bottom'),
                    array('title' => 'Outwear'),
                    array('title' => 'All women clothing')
            ),
            )
            // Ajouter des données pour les autres siblings ici...
        );

        return $this->render('catalogue/index.html.twig', [
            'categories' => $categorieRepository->findBy([],['id' => 'asc']),
            'siblingsData' => $siblingsData
        ]);
    }
    

}