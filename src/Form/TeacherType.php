<?php

namespace App\Form;

use App\Entity\Teacher;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class TeacherType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name' , TextType::class , [
                'attr' => [
                    'class' => 'form-control'
                ] , 
                'label' => ' Nom complet'
            ])
            ->add('subject' , TextType::class , [
                'attr' => [
                    'class' => 'form-control'
                ] , 
                'label' => ' Matiere a apprendre'
            ])
            ->add('photos' ,FileType::class , [
                'attr' => [
                    'class' => 'form-control' , 
                    'multiple' => true , 
                    'required' => false ,
                    'data_class' => null
                ] , 
                'label' => 'Image de prof'
            ] )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Teacher::class,
        ]);
    }
}
