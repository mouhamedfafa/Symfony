<?php

namespace App\Form;

use App\Entity\Module;
use PHPUnit\TextUI\XmlConfiguration\CodeCoverage\Report\Text;
use Symfony\Component\Form\Button;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class ModuleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('libellemodule',null,[
                'attr'=>[
                    'placeholder'=>"libelle de la module",'class'=>'form-control']]) 
           
              ->add('Valider',
                    SubmitType::class,['attr'=>['type'=>'submit','class'=>'btn btn-primary']]);
        
          
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults(['data_module' => Module::class]);
    }
}
