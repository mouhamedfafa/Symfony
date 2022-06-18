<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AnneScolaireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        // $builder
            // ->add('libelle')
            // // ->add('professeurs')
            // ->add('rp', EntityType::class,[ 
            //     'class'=>Rp::class,
            // 'choice_label'=>'nomComplet',
            // 'placeholder'=>'attachés',
            // 'label'=>'attaché de classe'])
            // ->add('SOUMETTRE',
            // SubmitType::class,[
            //     'attr'=>['type'=>'submit','name'=>'cre-classe','class'=>'btn btn-primary']]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
