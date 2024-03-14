<?php

namespace App\Form;

use App\Entity\Team;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TeamType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('teamName', TextType::class, [
                'required' => false,
                'empty_data' => '', // Set empty data if teamName is not set
                // You can also set a default value here if needed:
                // 'data' => 'Default Team Name'
            ])
            ->add('teamLeader', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'name',
            ])
            ->add('projectLeader', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'name',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Team::class,
        ]);
    }
}
