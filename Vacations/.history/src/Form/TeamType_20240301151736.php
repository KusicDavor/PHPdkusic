<?php

namespace App\Form;

use App\Entity\Team;
use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormError;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TeamType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        // varijabla za dohvat teama koji se uređuje
        $team = $builder->getData();
        $approverRolesTags = $options['approverRolesTags'];
        // forma za uređivanje timova
        $builder
            ->add('teamname', TextType::class, [
                'label' => 'Team name ',
                'attr' => ['class' => 'form-control']
            ])
            ->add('teamLeader', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'name',
                'attr' => ['class' => 'form-control'],
                'placeholder' => 'Select team leader',
                'required' => false,
                'query_builder' => function (EntityRepository $er) use ($team, $approverRolesTags) {
                    return $er->createQueryBuilder('u')
                        ->leftJoin('u.role', 'r')
                        ->andWhere('r.roleTag' = 'ROLE_TEAM_LEADER')
                        ->andWhere('r.roleTag IN (:roles)')
                        ->andWhere('u.team = :teamId')
                        ->setParameter('roles', $approverRolesTags)
                        ->setParameter('teamId', $team->getId());
                },
            ])
            ->add('projectLeader', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'name',
                'attr' => ['class' => 'form-control'],
                'placeholder' => 'Select project leader',
                'required' => false,
                'query_builder' => function (EntityRepository $er) use ($team, $approverRolesTags) {
                    return $er->createQueryBuilder('u')
                        ->leftJoin('u.role', 'r')
                        ->andWhere('r.roleTag IN (:roles)')
                        ->andWhere('u.team = :teamId')
                        ->setParameter('roles', $approverRolesTags)
                        ->setParameter('teamId', $team->getId());
                },
            ]);

        // forma za kreiranje novog tima
        if ($team->getId() === null) {
            $builder
                ->add('teamLeader', EntityType::class, [
                    'class' => User::class,
                    'choice_label' => 'name',
                    'placeholder' => 'Select team leader',
                    'attr' => ['class' => 'form-control'],
                    'required' => false,
                    'query_builder' => function (UserRepository $userRepository) {
                        return $userRepository->createQueryBuilder('u')
                            ->where('u.team IS NULL');
                    },
                ])
                ->add('projectLeader', EntityType::class, [
                    'class' => User::class,
                    'choice_label' => 'name',
                    'placeholder' => 'Select project leader',
                    'required' => false,
                    'attr' => ['class' => 'form-control'],
                    'query_builder' => function (UserRepository $userRepository) {
                        return $userRepository->createQueryBuilder('u')
                            ->where('u.team IS NULL');
                    },
                ]);
        }

        // validacija da nije isti team leader i project leader
        $builder->addEventListener(FormEvents::SUBMIT, function (FormEvent $event) {
            $team = $event->getData();
            $form = $event->getForm();

            $teamLeader = $team->getTeamLeader();
            $projectLeader = $team->getProjectLeader();

            if ($teamLeader === $projectLeader && ($teamLeader != null && $projectLeader != null)) {
                $form->addError(new FormError('The team leader and project leader cannot be the same user.'));
            }
        });
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Team::class,
            'team' => null,
            'approverRolesTags' => null
        ]);
    }
}
