<?php

namespace App\Form;

use App\Entity\Classe;
use App\Entity\Etudiant;
use App\Entity\AnneScolaire;
use App\Form\AnneScolaireType;
use Symfony\Component\Form\Button;
use Symfony\Component\Form\AbstractType;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use PHPUnit\TextUI\XmlConfiguration\CodeCoverage\Report\Text;


class EtudiantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomComplet',null,['required' => false,
                'attr'=>[
                    'placeholder'=>"nom complet de l'etudiant",'class'=>'form-control']]) 

            ->add('sexe',ChoiceType::class,[
                'choices'=>[
                    'Masc'=>null,'Feminin'=>'false'],'required'=>false,'attr'=>['class'=>'form-control']])

            ->add('adresse',null,[
                'attr'=>[
                    'placeholder'=>"adresse de l'etudiant",'required'=>false,'class'=>'form-control']])
                    

            ->add('classe',EntityType::class,[ 
                'class'=>Classe::class,
                  'choice_label'=>'libelle',
                  'placeholder'=>'classe',
                  'label'=>'classe etudiant','multiple' => false,'attr'=>['class'=>'form-control']], )

        //   ->add('anneeScolaire',EntityType::class,[
        //     'class'=>AnneScolaire::class,'choice_label'=>'libelle_anne','label'=>'annee','multiple' => false,'attr'=>['class'=>'form-control']
        // ]) 



                  ->add('Valider',
                  SubmitType::class,['attr'=>['type'=>'submit','class'=>'btn btn-primary']]);
      
            
            // ->add('matricule', HiddenType::class,[
            //     'attr'=>[
            //         'id'=>'matid','class'=>'form-control',]]);
        
          
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults(['data_class' => Etudiant::class]);
    }
}
