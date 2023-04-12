<?php

namespace App\DataFixtures;

use App\Entity\Adresse;
use App\Entity\Client;
use App\Entity\Coefficient;
use App\Entity\Commercial;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\String\Slugger\SluggerInterface;
use Faker;


class ClientsFixtures extends Fixture
{
    public function __construct(
        private UserPasswordHasherInterface $passwordEncoder,
        private SluggerInterface $slugger){}
    public function load(ObjectManager $manager): void
    {
        /***CREATE COMMERCIAL ****/

        $commercial = new Commercial();
        $commercial->setNom('Rutheford');
        $commercial->setPrenom('Cullen');
        $commercial->setSpecialisation('particuliers');
        $manager->persist($commercial);


        /***CREATE COEFFICIENT ****/

        $coeff = new Coefficient();
        $coeff->setNomination('particulier');
        $manager->persist($coeff);

        $admin = new Client();
        $admin->setEmail('admin@demo.fr');
        $admin->setNom('Lavellan');
        $admin->setPrenom('Salem');
        $admin->setIdCoeff($coeff);
        $admin->setIdCommercial($commercial);
        $admin->setPassword(
            $this->passwordEncoder->hashPassword($admin,'adminisnotthebestpassword')
        );
        $admin->setRoles(['ROLE_ADMIN']);
        $manager->persist($admin);

        /***CREATE ADRESSE ****/
        $adresse = new Adresse();
        $adresse->setIdClient($admin);
        $adresse->setNominationAdresse('Livraison');
        $adresse->setAdresse('6 Hell\' Corner Avenue');
        $adresse->setVille('NightCity');
        $adresse->setCp('66666');
        $adresse->setActif(true);        
        $manager->persist($adresse);

        /************************* CREATE USERS **************************/

        $faker = Faker\Factory::create('fr_FR');

            for($usr = 1; $usr<=5;$usr++){

                $user = new Client();
                $user->setEmail($faker->email);
                $user->setNom($faker->lastName);
                $user->setPrenom($faker->firstName);
                $user->setIdCoeff($coeff);
                $user->setIdCommercial($commercial);
                $user->setPassword(
                    $this->passwordEncoder->hashPassword($user,'secret')
                );
                $manager->persist($user);
        
                /***CREATE ADRESSE ****/
                $adresse = new Adresse();
                $adresse->setIdClient($user);
                $adresse->setNominationAdresse('Livraison');
                $adresse->setAdresse($faker->streetAddress);
                $adresse->setVille($faker->city);
                $adresse->setCp(str_replace(' ','',$faker->postcode));
                $adresse->setActif(true);        
                $manager->persist($adresse);

            }


        $manager->flush();
    }
}
