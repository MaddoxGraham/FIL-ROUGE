<?php

namespace App\Controller;

use App\Entity\Adresse;
use App\Entity\Client;
use App\Form\RegistrationFormType;
use App\Repository\CoefficientRepository;
use App\Repository\CommercialRepository;
use App\Security\ClientAuthenticator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\UserAuthenticatorInterface;
use Symfony\Contracts\Translation\TranslatorInterface;

class RegistrationController extends AbstractController
{
    #[Route('/inscription', name: 'app_register')]
    public function register(
        Request $request,
        UserPasswordHasherInterface $userPasswordHasher,
        UserAuthenticatorInterface $userAuthenticator,
        ClientAuthenticator $authenticator,
        EntityManagerInterface $entityManager,
        CommercialRepository $commercialRepository,
        CoefficientRepository $coefficientRepository,
    ): Response {
        $adresse = new Adresse();
        $user = new Client();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('plainPassword')->getData(),

                    $adresse->setActif(1),
                    $adresse->setIdClient($user),
                    $adresse->setNominationAdresse($form('nominationAdresse')),
                    $adresse->setAdresse($form('adresse')),
                    $adresse->setVille($form('ville')),
                    $adresse->setCp($form('cp')),

                    $user->setIdCommercial($commercialRepository->findOneBySpecialisation('particuliers')),
                    $user->setIdCoeff($coefficientRepository->findOneByNomination('particulier')),
                )
            );

            $entityManager->persist($user, $adresse);
            $entityManager->flush();
            // do anything else you need here, like send an email

            return $userAuthenticator->authenticateUser(
                $user,
                $authenticator,
                $request
            );
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }
}
