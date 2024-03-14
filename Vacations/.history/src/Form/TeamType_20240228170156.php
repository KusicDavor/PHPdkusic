<?php

namespace App\Form;

use App\Entity\Team;
use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TeamType extends AbstractType
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $team = $options['team'];
        if (!$team->getId() === null) {
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
                            ->andWhere('u.team IS NOT NULL')
                            ->setParameter('teamId', $team->getId());
                    },
                ]);
        } else {
            $builder
                ->add('teamname', TextType::class, [
                    'label' => 'Team name ',
                    'attr' => ['class' => 'form-control']
                ])
                ->add('teamLeader', EntityType::class, [
                    'class' => User::class,
                    'choice_label' => 'name',
                    'attr' => ['class' => 'form-control'],
                    'query_builder' => function (UserRepository $userRepository) {
                        return $userRepository->createQueryBuilder('u')
                            ->where('u.team IS NULL');
                    },
                ])
                ->add('projectLeader', EntityType::class, [
                    'class' => User::class,
                    'choice_label' => 'name',
                    'attr' => ['class' => 'form-control'],
                    'query_builder' => function (UserRepository $userRepository) {
                        return $userRepository->createQueryBuilder('u')
                            ->where('u.team IS NULL');
                    },
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
