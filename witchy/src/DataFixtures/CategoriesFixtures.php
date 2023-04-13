<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\String\Slugger\SluggerInterface;

class CategoriesFixtures extends Fixture
{

    public function __construct(private SluggerInterface $slugger){

    }
 //       private $count = 1;

    public function load(ObjectManager $manager): void
    {
         $women = $this->createCategory('Women',null,$manager);
         $Men = $this->createCategory('Men',null,$manager);
         $Shoes = $this->createCategory('Shoes',null,$manager);
         $Accessories = $this->createCategory('Accessories',null,$manager);
         $Home = $this->createCategory('Home',null,$manager);

/*************** FEMALE  *****************/
        $this->createCategory('Dress',$women,$manager);
        $this->createCategory('Top',$women,$manager);
        $this->createCategory('Bottom',$women,$manager);
        $this->createCategory('Outwear',$women,$manager);

/*************** MALE  *****************/
        $this->createCategory('Top',$Men,$manager);
        $this->createCategory('Bottom',$Men,$manager);
        $this->createCategory('Outwear',$Men,$manager);
        
/*************** SHOES  *****************/

        $this->createCategory('Boots',$Shoes,$manager);
        $this->createCategory('Heels',$Shoes,$manager);
        $this->createCategory('Flat',$Shoes,$manager);

/*************** ACCESSORIES  *****************/
        $this->createCategory('Jewellery',$Accessories,$manager);
        $this->createCategory('Bags',$Accessories,$manager);
        $this->createCategory('Belts & Harnesses',$Accessories,$manager);
        $this->createCategory('Socks',$Accessories,$manager);
        $this->createCategory('Sunglasses',$Accessories,$manager);
        $this->createCategory('Hair Accessories',$Accessories,$manager);
        $this->createCategory('Hat & Headbands',$Accessories,$manager);

/*************** HOME  *****************/

$this->createCategory('Bedding & Cushions',$Home,$manager);
$this->createCategory('Rugs',$Home,$manager);
$this->createCategory('Candles & Scent',$Home,$manager);
$this->createCategory('Mirror',$Home,$manager);
$this->createCategory('Pets',$Home,$manager);
$this->createCategory('Baking',$Home,$manager);
$this->createCategory('Tableweare',$Home,$manager);
$this->createCategory('Towel & Mats',$Home,$manager);
$this->createCategory('Gift Cards',$Home,$manager);


        $manager->flush();
    }

    public function createCategory(string $name, Categorie $parent = null, ObjectManager $manager){
     
        $category = new Categorie();
        $category->setNomination($name);
        $category->setSlug($this->slugger->slug($category->getNomination())->lower());
        $category->setParent($parent);
        $manager->persist($category);

        return $category;

    }
}
