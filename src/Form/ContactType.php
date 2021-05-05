<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title' , TextType::class , [
                'attr' => [
                    'class' => 'form-control'
                ] , 
                'label' => ' Titre de page'
            ])
            ->add('adress', TextType::class , [
                'attr' => [
                    'class' => 'form-control'
                ] , 
                'label' => ' Adresse'
            ])
            ->add('email', EmailType::class, [
                'required'=>true,
                'label'  => "Email:",
                'attr'=>[
                    'class'=>'form-control',
                    'maxlength'=>'180',
                ]
            ])
            ->add('telephone', TextType::class, [
                'required'=>true,
                'label'=>'Numéro téléphone:',
                'attr'=>[
                    'class'=>'form-control',
                ]
            ])
            ->add('facebook', TextType::class , [
                'attr' => [
                    'class' => 'form-control'
                ] , 
                'label' => ' Compte Facebook'
            ])
            ->add('twitter', TextType::class , [
                'attr' => [
                    'class' => 'form-control'
                ] , 
                'label' => ' Compte twitter'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
