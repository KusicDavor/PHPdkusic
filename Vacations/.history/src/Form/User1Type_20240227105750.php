<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class User1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email')
            ->add('password')
            ->add('roles', CollectionType::class, [
                'entry_type' => TextType::class, // Assuming the roles are strings
                'allow_add' => true, // Allow adding new roles
                'allow_delete' => true, // Allow removing existing roles
                'prototype' => true, // Enable prototype for JavaScript-based dynamic form handling
                'entry_options' => [
                    'attr' => ['class' => 'role-input'], // Add a CSS class to each role input
                ],
            ]);
            //->add('roles')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
