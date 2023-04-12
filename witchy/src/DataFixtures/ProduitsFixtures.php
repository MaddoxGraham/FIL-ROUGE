<?php

namespace App\DataFixtures;

use App\Entity\Produit;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\String\Slugger\SluggerInterface;
use Faker;

class ProduitsFixtures extends Fixture
{
    public function __construct(private SluggerInterface $slugger)
    {
        
    }
    public function load(ObjectManager $manager): void
    {
      $faker = Faker\Factory::create('fr_FR');

      for($prod=1; $prod<=20; $prod++){
        $produit= new Produit();
        $produit->setShortLibel($faker->text(12));
        $produit->setLongLibel($faker->text());
        $produit->setSlug($this->slugger->slug($produit->getShortLibel())->lower());
        $produit->setPrxHt($faker->numberBetween(500,1500));

        // chercher la référence de categorie sans prendre de 1 a 6 
        $caterory = $this->getReference('cat-'.rand(7,25));
        $produit->setIdCat($caterory);



        $manager->persist($produit);
      }
        $manager->flush();
    }
}
