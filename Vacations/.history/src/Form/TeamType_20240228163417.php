<?php

namespace App\Form;

use App\Entity\Team;
use App\Entity\User;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TeamType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $team = $options['team'];
        $builder
            ->add('teamname', TextType::class, [
                'label' => 'Team name ',
                'attr' => ['class' => 'form-control']
            ]);

        if ($team->getId()) {
            $builder->add('teamLeader', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'name',
                'attr' => ['class' => 'form-control'],
                'query_builder' => function (EntityRepository $er) use ($team) {
                    return $er->createQueryBuilder('u')
                        ->andWhere('u.team = :teamId')
                        ->setParameter('teamId', $team->getId());
                },
            ])
                ->add('projectLeader', EntityType::class, [
                    'class' => User::class,
                    'choice_label' => 'name',
                    'attr' => ['class' => 'form-control'],
                    'query_builder' => function (EntityRepository $er) use ($team) {
                        return $er->createQueryBuilder('u')
                            ->andWhere('u.team = :teamId')
                            ->setParameter('teamId', $team->getId());
                    },
                ]);
        } else {
            $builder
                ->add('teamLeader', EntityType::class, [
                    'class' => User::class,
                    'choice_label' => 'name',
                    'attr' => ['class' => 'form-control']
                ])
                ->add('projectLeader', EntityType::class, [
                    'class' => User::class,
                    'choice_label' => 'name',
                    'attr' => ['class' => 'form-control']
                ]);
        }
    }


    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Team::class,
            'team' => null,
        ]);
    }
}
