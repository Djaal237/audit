<?php

namespace App\Form;

use App\Entity\Incident;
use App\Entity\Tache;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TacheType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('libelle')
            ->add('incident', EntityType::class,[
                'required'=>false,
                'class'=>Incident::class,
                'choice_label'=>'description',
                
            ])
            ->add('type')
            ->add('echeance1', DateType::class,[
                'required'=>false,
                'placeholder'=>[
                    'year'=>'Annee', 'month'=> 'Mois', 'day'=>'Jour'
                ],
            ])
            ->add('echeance2', DateType::class,[
                'required'=>false,
                'placeholder'=>[
                    'year'=>'Annee', 'month'=> 'Mois', 'day'=>'Jour'
                ],
            ])
            ->add('dateRealisation', DateType::class,[
                'required'=>false,
                'placeholder'=>[
                    'year'=>'Annee', 'month'=> 'Mois', 'day'=>'Jour'
                ],
            ])
            ->add('solde', ChoiceType::class,[
                'required' => false,
                'choices'=>[
                    'Soldé'=>true,
                    'Non Soldé'=>false
                ]
            ])
            ->add('efficace')
            ->add('commentaire')
            ->add('source')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Tache::class,
        ]);
    }
}
