<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use App\Entity\Photo;
use App\Entity\Produit;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\Validator\Constraints\Length;

class ProduitsFixtures extends Fixture
{
    public function __construct(private SluggerInterface $slugger)
    {
        
    }
    public function load(ObjectManager $manager): void
    {
      

 $produit = $this->createProduct(
  'Academia Dark Academia Robe en tartan à bouton ',
  'Couleur: Multicolore.Style: Casual.Type de motif:Carreau.détails:Avec boutons devant.Type:Trapèze.Type du col:Revers.Longueur des manches:Manches courtes.Type de manches:Classiques.Tour de taille:Taille haute.Ourlet/finition:Évasé.Longueur:Court.Type d\'ajustement:Coupe régulière.Tissu:Pas de l\'extensibilité.Tissu/matériel:Tissu tissé.Composition:100% Polyester.Instructions d\'entretien:Lavage à la main ou nettoyage à sec professionnel.Transparent:Non ',
  57.99,
  6,
  [
    'https://img.ltwebstatic.com/images3_pi/2022/10/18/1666062772a8652467ad2ebfa7fd41879694c2ac3b_thumbnail_600x.webp',
    'https://img.ltwebstatic.com/images3_pi/2022/10/18/16660627758ff9c17ef85cf264565b30d21a019f7d_thumbnail_600x.webp',
    'https://img.ltwebstatic.com/images3_pi/2022/10/18/1666062778680872df4b52b8b90d87f85c2f97b16f_thumbnail_600x.webp',
    'https://img.ltwebstatic.com/images3_pi/2022/10/18/1666062785c4f3118b59348206129af8b58572358f_thumbnail_600x.webp',
    'https://img.ltwebstatic.com/images3_pi/2022/07/28/1658980919e96347eda3b4fc793a99c6371a0ef47b_thumbnail_600x.webp'
],
  $manager);

 $produit = $this->createProduct('Element Cats: Air Plush Toy ',
  'Be blown away by the adorable plushie . With their soft velvety fur and super plush soft white accents, standing at 30cm tall. Detailed in stunning pale blue embroidered details and glistening light blue eyes you simply must breathe in their cuteness!  ',
39.95,
24,
[
  'https://cdn.shopify.com/s/files/1/0539/0722/6789/products/ELEMENTAL-CATS-AIR-B_500x.jpg?v=1677587307',
  'https://cdn.shopify.com/s/files/1/0539/0722/6789/products/Elemental-Cats-Air-Plush-Toy-G_500x.jpg?v=1677587307',
  'https://cdn.shopify.com/s/files/1/0539/0722/6789/products/Elemental-Cats-Air-Plush-Toy-B.jpg?v=1677587307'
],
$manager);


$produit = $this->createProduct('B.L.P-04/CMR',
'Pants Material with Taslan RED Mix with polyester.Material : TASLAN RED Mix Polyester [ WATER PROOF ].Model Weight / Height : 75 kg / 175 cm.GET ADD 2 COLOR STRAP : BLACK AND RED',
160.00,
11,
[
'https://cdn.shopify.com/s/files/1/0083/1530/6048/products/BLP04CMRX.jpg?v=1620472700&width=1680',
'https://cdn.shopify.com/s/files/1/0083/1530/6048/products/BLP04CMR2.jpg?v=1620495042&width=1680',
'https://cdn.shopify.com/s/files/1/0083/1530/6048/products/bvlp04cmr3.jpg?v=1620495119&width=1680',
'https://cdn.shopify.com/s/files/1/0083/1530/6048/products/sizechartblp04_48794d12-08d7-4cbd-9afd-d57380a5cd57.jpg?v=1627890177&width=1680'
],
$manager);

$produit = $this->createProduct(' Panic Platform Shoes ',
'Tired of \'vanilla\' footwear? The "Panic" platform shoes from Killstar are here to spice it up! These stunners feature a striking glossy black body, and a multi-strap design with statement pentagram buckles to give a touch of edginess to any outfit, while the inside zip closure and the adjustable straps ensure a comfortable fit. The low-cut toe is extremely flattering on the foot and with a towering chunky heel and a thick platform, they are a must-have for night outs, photoshoots, or parties. With these killer heels world domination is a given!',
128.88,
14,
[
'https://fantasmagoria.shop/99046/panic-platform-shoes.jpg',
'https://fantasmagoria.shop/99047/panic-platform-shoes.jpg',
'https://fantasmagoria.shop/99048/panic-platform-shoes.jpg',
'https://fantasmagoria.shop/99049/panic-platform-shoes.jpg',
'https://fantasmagoria.shop/99050/panic-platform-shoes.jpg',
'https://fantasmagoria.shop/99302/panic-platform-shoes.jpg'
],
$manager);

$produit = $this->createProduct(' Pricilla Platforms ',
'Channel some seriously cute and magical vibes with the `Pricilla` platforms - in luxurious patent faux leather with a heel, cookie-cutter pattern, and platform. Comfortable and airy - perfect for hot days/nights, dates, and events!',
122.04,
14,
[
'https://fantasmagoria.shop/77711/pricilla-platforms.jpg',
'https://fantasmagoria.shop/77712/pricilla-platforms.jpg',
'https://fantasmagoria.shop/95671/pricilla-platforms.jpg'
],
$manager);

$produit = $this->createProduct(' She\'S Out There Wedges ',
'Get closer to the stars with the \'She\'s Out There\' platform wedges - in a luxe faux leather body, lace-up front with triple velcro straps, padded and stitched back detail, metal alien hardware and 6" thick platform - to elevate your game.Match as your heart desire - yer ready for take-off! with WITCHY Branding, 100% PU/Man-Made Materials.',
108.84,
14,
[
'https://fantasmagoria.shop/67061/shes-out-there-wedges.jpg',
'https://fantasmagoria.shop/67063/shes-out-there-wedges.jpg',
'https://fantasmagoria.shop/67064/shes-out-there-wedges.jpg',
'https://fantasmagoria.shop/67065/shes-out-there-wedges.jpg',
'https://fantasmagoria.shop/67066/shes-out-there-wedges.jpg',
'https://fantasmagoria.shop/67066/shes-out-there-wedges.jpg'
],
$manager);


$produit = $this->createProduct('Four Flies Dress',
'With KILLSTAR branding, 94% Viscose 6% Elastane.Machine wash cold (30°c) / Do not bleach / Do not tumble dry / Iron at low temperature / Do not dry clean / Imported.',
44.95,
6,
[
'https://cdn.shopify.com/s/files/1/0539/0722/6789/products/FOUR-FLIES-DRESS-W-B_500x.jpg?v=1680189653',
'https://cdn.shopify.com/s/files/1/0539/0722/6789/products/FOUR-FLIES-DRESS-W-C_1_500x.jpg?v=1680189653',
'https://cdn.shopify.com/s/files/1/0539/0722/6789/products/FOUR-FLIES-DRESS-W-D_1_500x.jpg?v=1680189653',
'https://cdn.shopify.com/s/files/1/0539/0722/6789/products/FOUR-FLIES-DRESS-W-E_1.jpg?v=1680189653',
'https://cdn.shopify.com/s/files/1/0539/0722/6789/products/FOUR-FLIES-DRESS-W-F_1.jpg?v=1680189653'
],
$manager);

$produit = $this->createProduct(' Charmed Vines Mini Dress - Ivory ',
'Widow Charmed Vines Mini Dress - Ivory cuz you have a magical green thumb. This mini dress has a sheer mesh construction, a flocked floral pattern all over, a mock neckline, a lettuce trim, and comes with matching arm length gloves that have adjustable tie closures.',
78.95,
6,
[
'https://cdn.shopify.com/s/files/1/0634/6335/8721/products/79takXPxu3ORiq8mlgtxz1XwR8WyxpvT-24.jpg?v=1677278617',
'https://cdn.shopify.com/s/files/1/0634/6335/8721/products/yQQwiJrW922U1sgc0HIBWAS7wiuM0bgY-24.jpg?v=1677278617',
'https://cdn.shopify.com/s/files/1/0634/6335/8721/products/yh09qsZI7TSkK5xAXXHwrx6IaFVTv5P8-24.jpg?v=1677278617',
'https://cdn.shopify.com/s/files/1/0634/6335/8721/products/DTnBEMpPjh8pf7maSzued6pyuiahzc31-24.jpg?v=1677278617',
'https://cdn.shopify.com/s/files/1/0634/6335/8721/products/E7jAcKk1gYdQS5OAuRr5FrbSQOdsOjC1-24.jpg?v=1677278617'
],
$manager);

$produit = $this->createProduct(' Echo Rockslide Print Midi Dress ',
'DARKER WAVS Echo Rockslide Print Midi Dress in mixed sheer mesh and fishnet patchwork construction with asymmetrical handkerchief hemline. Adjustable shoulder straps, criss-cross halter tie neckline, and exposed stitching details all over.',
64.00,
6,
[
'https://cdn.shopify.com/s/files/1/0634/6335/8721/products/eacoiksr1K1gfjMNZq3o80goxhMLUVeH.jpg?v=1680800932',
'https://cdn.shopify.com/s/files/1/0634/6335/8721/products/GFC03gLEhvmtYiOlArCaNzBqpNWBXmPu.jpg?v=1680800932',
'https://cdn.shopify.com/s/files/1/0634/6335/8721/products/zBEfxlks4DX6w4gSnvCJu6zeoyXisXAJ.jpg?v=1680800932',
'https://cdn.shopify.com/s/files/1/0634/6335/8721/products/ocCg71RGe1Z8H6gcP2C3mxryu3jHVlxM.jpg?v=1680800932'
],
$manager);


$produit = $this->createProduct('Am I The Drama Mini Dress ',
'HOROSCOPEZ Am I The Drama Mini Dress cuz you can\'t help it. This mini dress comes with long sleeves, a square neckline, halter neck straps, keyhole cut outs, o-ring details, and a bodycon fit',
53.95,
6,
[
'https://cdn.shopify.com/s/files/1/0634/6335/8721/products/UOSScsepSiJATzepGIEtRFSqLTpHGuLU-24.jpg?v=1670534589',
'https://cdn.shopify.com/s/files/1/0634/6335/8721/products/BGMqJ2CF59UMhdS6iEA4PhtweiT3e1JR-24_bfaa1681-c982-43e0-9853-96be045bf195.jpg?v=1660862617',
'https://cdn.shopify.com/s/files/1/0634/6335/8721/products/J3dKUxhq0epVCmRRT9mGxwBvKwDix0Vc-24_2b96dc08-0c22-4eca-84da-36a77fd8b2b4.jpg?v=1660862618',
'https://cdn.shopify.com/s/files/1/0634/6335/8721/products/zpqvi5EYNXEEIkW4mQLU97TEQImk0auC-24_263ae40e-d368-4701-8e76-f24cdc394e6b.jpg?v=1660862618'
],
$manager);

$produit = $this->createProduct(' Let\'s Cause Chaos Mini Dress ',
'Current Mood Let\'s Cause Chaos Mini Dress cuz you\'re down for a little mayhem! Make a statement with this mini dress that has an all over airbrushed clown punk print, a fishnet overlay, a V-neckline, and adjustable shoulder straps.',
50.95,
6,
[
'https://cdn.shopify.com/s/files/1/0634/6335/8721/products/0PHWtaeUs97cG0aaQOOYrIjDtL4SRVGO-24.jpg?v=1655918798',
'https://cdn.shopify.com/s/files/1/0634/6335/8721/products/DL5jjHe6A3h0F9KDMGMIxsZCENZxfpyy-24.jpg?v=1655918798',
'https://cdn.shopify.com/s/files/1/0634/6335/8721/products/i2ZCmlvKwa2hzms6UNIoN1yL6dQ98pwP-24.jpg?v=1655918798',
'https://cdn.shopify.com/s/files/1/0634/6335/8721/products/zsjt8iOhFmk7oc9bkXFgD1QxuzHIVcvd-24.jpg?v=1655918798',
'https://cdn.shopify.com/s/files/1/0634/6335/8721/products/J5AeSGOqxwLFkQm8gVBnzWnGrAwjLkhq-24.jpg?v=1655918798'
],
$manager);

$produit = $this->createProduct(' Glowing Kinetic Kitten Fishnet Dress ',
'Club Exx Glowing Kinetic Kitten Fishnet Dress cuz your energy is contagious, babe. Youâre an atomic muse in this stretchy fishnet mini dress that has long sleeves, a high neckline, and a bodycon fit.',
42.95,
6,
[
'https://cdn.shopify.com/s/files/1/0634/6335/8721/products/KhksdmRoWH0JMoRRkT450cRkfAOlq7Q9-24.jpg?v=1651699285',
'https://cdn.shopify.com/s/files/1/0634/6335/8721/products/rRlZVKoCrUEGBUMIbZawHUbAhlHqpUl9-24.jpg?v=1651699285',
'https://cdn.shopify.com/s/files/1/0634/6335/8721/products/5ERyZtN7xincERTw2RS9Ak508P4fA2iD-24.jpg?v=1651699285',
'https://cdn.shopify.com/s/files/1/0634/6335/8721/products/VKe3kd3FSfO6AvhbAhRzpBGKkQfNUtbG-24.jpg?v=1651699285'
],
$manager);

$produit = $this->createProduct(' VRTB-02- Hoodie jaune',
'Oversized sweet jaune. Tissu de l\'univers VRTB-02 Sweat à capuche jaune.60% coton 40% polyester. 10 onces d\'épaisseur.',
140.53,
10,
[
'https://img.staticdj.com/ed322116ff010b8f824d2ac836bc79a8_1080x.jpeg',
'https://img.staticdj.com/735552b77a5eb6c7b5380e615f508ffd_1080x.jpeg',
'https://img.staticdj.com/3ce4d0efba29e8212203f16b4aea5635_1080x.jpeg',
'https://img.staticdj.com/9b4f0d1167e12c879c6cebe3cbb19496_1080x.jpeg',
'https://img.staticdj.com/9d92a49797a21cefab19698d36c80013_1080x.jpeg',
'https://img.staticdj.com/4aa992a93494955a965a7b9cb5a22690_1080x.jpeg',
'https://img.staticdj.com/3608912944b04e911eb05d6a36d60530_1080x.jpeg'
],
$manager);


$produit = $this->createProduct(' Liquid Silver Trinity Boots ',
'Demonia Liquid Silver Trinity Boots cuz you\'ll fuel their robot hearts, babe. These knee high platform boots have a metallic vegan leather construction, tons of adjustable buckle straps down the front with metal plates, and back zip closures.',
184.95,
13,
[
'https://cdn.shopify.com/s/files/1/0634/6335/8721/products/kbiEZCHRaN7Xk4EDmCDDoRykoLxxVxg9-24.jpg?v=1660600218',
'https://cdn.shopify.com/s/files/1/0634/6335/8721/products/pz3Grev8YXppYUtDCWq8qNF47uYaVtPi-24.jpg?v=1660600219',
'https://cdn.shopify.com/s/files/1/0634/6335/8721/products/ar9XqfuX6c4wKOFVBNE2PiAi8He3Eoqb-24.jpg?v=1660600219',
'https://cdn.shopify.com/s/files/1/0634/6335/8721/products/EF7QIIzZBRnbvtNaIb4t97Lb6617a7cs-24.jpg?v=1660600219'
],
$manager);

$produit = $this->createProduct(' Blindin Pixie Queen Lace Up Heels ',
'Pixie Queen Lace Up Heels cuz you\'re a rare vision of pricey perfection, babe! These chunky platform heels have a glittery rhinestone construction, lace-up wrap straps with adjustable tie closures, and 3D butterfly details all over. **Note: These shoes are hand made and fragi',
114.00,
14,
[
'https://cdn.shopify.com/s/files/1/0634/6335/8721/products/shoe1.jpg?v=1680826111',
'https://cdn.shopify.com/s/files/1/0634/6335/8721/products/LTcxU1PG0rWjY0K4ZNmAzI4N3JRviLfA-24.jpg?v=1677093439',
'https://cdn.shopify.com/s/files/1/0634/6335/8721/products/OeHa4icKB0G7aX1CEXQElZbw1MRv7rj6-24.jpg?v=1677094035',
'https://cdn.shopify.com/s/files/1/0634/6335/8721/products/B5AEV3O7pTpGJbJZniOhujQD14ZygmtO-24.jpg?v=1677094035',
'https://cdn.shopify.com/s/files/1/0634/6335/8721/products/VDlrI26yNSQaBGf33jCnHz4jm6rSSSzN-24_701e647f-f39a-435a-9ae7-2f1500835d3a.jpg?v=1677094035',
'https://cdn.shopify.com/s/files/1/0634/6335/8721/products/JfmMMW6ZbbwHUn3wvWvZ2EJLuAZzXarl.jpg?v=1680203875',
'https://cdn.shopify.com/s/files/1/0634/6335/8721/products/shoe2.jpg?v=1680826111',
'https://cdn.shopify.com/s/files/1/0634/6335/8721/products/shoe3.jpg?v=1680826112'
],
$manager);

$produit = $this->createProduct(' Traitor Boots - Lime Green Holo ',
'Club Exx Traitor Boots - Lime Green Holo cuz you\'re ready for an alien invasion! These wedge platform boots have a holographic construction, zippered stash pockets, adjustable laces, and side zip closures.',
131.90,
13,
[
'https://cdn.shopify.com/s/files/1/0634/6335/8721/products/Ep2Uxb3z8lnlTB2ghvUItoCBIeRCxAsG-24.jpg?v=1678748842',
'https://cdn.shopify.com/s/files/1/0634/6335/8721/products/CDe9E4yHu31tglPleYKIwfRbzzeLTZjx-24.jpg?v=1678748842',
'https://cdn.shopify.com/s/files/1/0634/6335/8721/products/JSZcElgtSanJIR8FS9zCx8xeOKNX4LI0-24.jpg?v=1678748842',
'https://cdn.shopify.com/s/files/1/0634/6335/8721/products/wllxzrc9SBAJC9EnIhvqB1Tc9yQbKhag-24.jpg?v=1678748842'
],
$manager);

$produit = $this->createProduct(' Fairywalker Platform Sneakers ',
'Sugar Thrillz Fairywalker Platform Sneakers will bring \'em right back to reality, bb! Playtime is over in these chunky platform sneakers that have holographic panels, adjustable lace-ups, and velcro strap closures with heart-shaped trim.',
139.95,
13,
[
'https://cdn.shopify.com/s/files/1/0634/6335/8721/products/1adwwd9smHoevIJIHW8J1V6INPMWn35I.jpg?v=1681497639',
'https://cdn.shopify.com/s/files/1/0634/6335/8721/products/TNbaBxFZarfkGxgvIDBjNFVSofpBHTyr.jpg?v=1681497624',
'https://cdn.shopify.com/s/files/1/0634/6335/8721/products/ybrKSAg6vbPs7qlynUId7DwnewcQD1Ep.jpg?v=1681497632',
'https://cdn.shopify.com/s/files/1/0634/6335/8721/products/TNbaBxFZarfkGxgvIDBjNFVSofpBHTyr-24_6647bf69-a8cd-4f66-9715-71df4a4f843d.jpg?v=1675790075'
],
$manager);


$produit = $this->createProduct(' Neon Jawbreaker Traitor Boots ',
'Club Exx Neon Jawbreaker Traitor Boots make their jaws drop, babe! You are lethal on the dance floor in these wedge platform boots that have a contrast neon green design all over, a vegan leather construction, adjustable lace-ups, and side zip closures.',
158.85,
13,
[
'https://cdn.shopify.com/s/files/1/0634/6335/8721/products/S403838_0061_23-03-30.jpg?v=1680306083',
'https://cdn.shopify.com/s/files/1/0634/6335/8721/products/S403838_0064_23-03-30.jpg?v=1680306083',
'https://cdn.shopify.com/s/files/1/0634/6335/8721/products/S403838_0063_23-03-30.jpg?v=1680306083',
'https://cdn.shopify.com/s/files/1/0634/6335/8721/products/S403838_0062_23-03-30.jpg?v=1680306083'
],
$manager);

$produit = $this->createProduct(' Holy Revelation Platform Heels - Mint ',
'These platform heels have a crushed velvet construction, pearl beaded details all over with heart and cross charms, and adjustable velcro strap closures at the ankles.',
90.95,
14,
[
'https://cdn.shopify.com/s/files/1/0634/6335/8721/products/ONzWZq8af7Xky7weHiEXWDdREM4aflEM-24.jpg?v=1678309302',
'https://cdn.shopify.com/s/files/1/0634/6335/8721/products/vsIme8b2LHfHKitRsvKMpTLJ9aq7hj5W-24.jpg?v=1678309302',
'https://cdn.shopify.com/s/files/1/0634/6335/8721/products/YaA7JOVz7GsdmV3zjgVtjEg8SHuvLCWE-24.jpg?v=1678309302',
'https://cdn.shopify.com/s/files/1/0634/6335/8721/products/MlPhFlN7xGRhhADnuiIr834SQrg5YdSy-24.jpg?v=1678309302'
],
$manager);

// $produit = $this->createProduct('',
// '',
// 0.00,
// 11,
// [
// '',
// '',
// '',
// '',
// '',
// ''
// ],
// $manager);


  $manager->flush();
     } 
     
     public function createProduct(string $shortLibel, string $LongLibel, float $prxHT, int $idCat,array $src,ObjectManager $manager){
     
        $produit = new Produit();
        $produit->setShortLibel($shortLibel);
        $produit->setLongLibel($LongLibel);
        $produit->setPrxHt($prxHT);
        $produit->setSlug($this->slugger->slug($produit->getShortLibel())->lower());
        $produit->setCategorie($manager->getRepository(Categorie::class)->findOneBy(array('id'=> $idCat)));
        $manager->persist($produit);

       
       for ($elem = 0; $elem<count($src);$elem++){     
        $photo = new Photo();
        $photo->setRefProduit($produit);
        $photo->setSrc($src[$elem]);
        if($elem==0){
           $photo->setIsprimary(true);
        }else{
          $photo->setIsprimary(false);
        }
       
        $manager->persist($photo);  }



    }

}
