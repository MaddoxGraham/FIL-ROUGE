<?php

namespace App\Form;

use App\Entity\Adresse;
use App\Entity\Client;
use App\Entity\Coefficient;
use App\Entity\Commercial;
use App\Repository\CommercialRepository;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {

        $builder


            ->add('email', EmailType::class, [
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'Votre E-Mail'
            ])
            ->add('nom', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'Votre Nom'
            ])
            ->add('prenom', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'Votre Prénom'
            ])
            ->add('telephone', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'Votre Téléphone'
            ])

            ->add('nomination_adresse', ChoiceType::class, [
                'mapped' => false,
                'choices'=>[
                    'livraison' => true,
                    'facturation' =>false,
                ],
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'Cette adresse est votre adresse de '
            ])

            ->add('adresse', TextType::class, [
                'mapped' => false,
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'Votre adresse'
            ])
            ->add('ville', TextType::class, [
                'mapped' => false,
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'Votre Ville'
            ])
            ->add('cp', TextType::class, [
                'mapped' => false,
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'Votre code Postal'
            ])



            ->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'attr' => [
                    'autocomplete' => 'new-password',
                    'class' => 'form-control'
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
                'label' => 'Votre mot de Passe'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // 'data_class' => Client::class,
        ]);
    }
}
