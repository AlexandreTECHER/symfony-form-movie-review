<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Range;
use Symfony\Component\Validator\Constraints\Url;

class MovieReviewType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'constraints' => new NotBlank([
                    'message' => 'Votre nom est requis pour publier votre commentaire', // Le message qui s'affiche si le champs est Blank (vide)
                ]),
                'label' => 'Nom',
            ])
            ->add('firstname', TextType::class, [
                'label' => 'Prénom',
                'required' => false,
            ])
            ->add('message', TextareaType::class, [
                'constraints' => [
                    new NotBlank(),
                    new Length([
                        'min' => 100,
                    ]),
                ],
                'attr' => [
                    'minlength' => 100,
                ],
            ])
            ->add('email', EmailType::class, [
                'constraints' => [
                    new NotBlank(),
                    new Email(),
                ],
                'label' => 'Adresse e-mail',
            ])
            ->add('age', IntegerType::class, [
                'constraints' => [
                    new NotBlank(),
                    new Range([
                        'min' => 7,
                        'max' => 77,
                    ])
                ],
                'label' => 'Âge',
            ])
            ->add('password', PasswordType::class, [
                'constraints' => [
                    new NotBlank(),
                    new Length([
                        'min' => 8,
                        'max' => 16,
                    ]),
                ],
                'label' => 'Mot de passe',
            ])
            ->add('url', UrlType::class, [
                'constraints' => [
                    new NotBlank(),
                    new Url(),
                ],
                'label' => 'Site web',
            ])
            ->add('rate', ChoiceType::class, [
                'choices'  => [
                    'Excellent' => 5,
                    'Très bon' => 4,
                    'Bon' => 3,
                    'Peut mieux faire' => 2,
                    'À éviter' => 1,
                ],
                'label' => 'Avis',
            ])
            ->add('reaction', ChoiceType::class, [
                'choices'  => [
                    'Rire' => 'laugh',
                    'Pleurer' => 'cry',
                    'Réfléchir' => 'think',
                    'Dormir' => 'sleep',
                    'Rêver' => 'dream',
                ],
                'label' => 'Ce film vous a fait…',
            ])
            ->add('date', DateType::class, [
                'constraints' => new Date(),
                'label' => 'Vous avez vu ce film le '
            ])
            ->add('file', FileType::class, [
                'constraints' => new File(),
                'label' => 'Photo du cinéma ou de la salle'
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Envoyer',
                'attr' => [
                    'class' => 'btn-danger'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
