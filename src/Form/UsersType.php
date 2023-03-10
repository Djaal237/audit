<?php

namespace App\Form;

use App\Entity\Users;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class UsersType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class,[
                'required'=>false,
                'attr' => [
                    'placeholder' => 'Inserez le nom de l\'utilisateur'
                ]
            ])
            ->add('prenom', TextType::class,[
                'required'=>false,
                'attr' => [
                    'placeholder' => 'Inserez le prenom de l\'utilisateur'
                ]
            ])
            ->add('email', EmailType::class,[
                'required'=>false,
                'attr' => [
                    'placeholder' => 'Inserez l\'email de l\'utilisateur'
                ]
            ])
            ->add('username', TextType::class,[
                'required'=>false,
                'attr' => [
                    'placeholder' => 'Inserez le nom du compte'
                ]
            ])
            ->add('password', PasswordType::class,[
                'required'=>false,
                'attr' => [
                    'placeholder' => 'Inserez le mot de passe de l\'utilisateur'
                ]
            ])
            ->add('roles', ChoiceType::class,[
                'choices'=>[
                    'Administrateur'=>'ROLE_ADMIN',
                    'Utilisateur'=>'ROLE_USER',
                ],
                'multiple' => false,
                'expanded' => false,
                'placeholder'=>'------ Profil ------',
                'required'=>false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Users::class,
        ]);
    }
}
