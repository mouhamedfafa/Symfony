<?php

namespace App\Form;

use App\Entity\Classe;
use App\Entity\Module;
use App\Entity\Professeur;
use Symfony\Component\Form\Button;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;



class ProfesseurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomComplet',null,[
                'required'=>false,
                'attr'=>[
                    'placeholder'=>"nom complet du Professeur",'class'=>'form-control']])
                    
                    ->add('sexe',ChoiceType::class,[
                        'choices'=>[
                            'Masc'=>null,'Feminin'=>'false'],'attr'=>['class'=>'form-control']])

            ->add('adresse',null,[
                'required' => false,
                'attr'=>[
                    'placeholder'=>"adresse du professeur ",'class'=>'form-control']])
            ->add('grade',null,[
                'required'=>false,

                        'attr'=>[
                            'placeholder'=>"adresse du professeur ",'class'=>'form-control']])

            ->add('classes',EntityType::class,[ 
               'class'=>Classe::class,
                 'choice_label'=>'libelle',
                 'placeholder'=>'classe',
                 'label'=>'classe prof','multiple' => true,'mapped'=>true,'expanded'=>true,'attr'=>['class'=>'form-control']], )

            ->add('modules',EntityType::class,[ 
                'class'=>Module::class,
                  'choice_label'=>'libelleModule',
                  'placeholder'=>'module',
                  'label'=>'module sprof','multiple' => true,'mapped'=>true,'expanded'=>true,'attr'=>['class'=>'form-control ']], )
 

            ->add('SOUMETTRE',
              SubmitType::class,[
                 'attr'=>['type'=>'submit','name'=>'cre-classe','class'=>'btn btn-primary']]);
            
            
            // ->add('classe');
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults(['data_class' => Professeur::class]);
    }
}
