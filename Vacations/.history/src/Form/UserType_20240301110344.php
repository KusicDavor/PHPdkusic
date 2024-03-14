<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Role;
use App\Entity\Team;
use App\Repository\UserRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormError;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Name ',
                'attr' => ['class' => 'form-control']
            ])
            ->add('email', null, [
                'label' => 'Email ',
                'attr' => ['class' => 'form-control']
            ])
            ->add('job', TextType::class, [
                'label' => 'Job ',
                'attr' => ['class' => 'form-control']
            ])
            ->add('vacationDays', IntegerType::class, [
                'label' => 'Number of vacation days ',
                'attr' => ['class' => 'form-control']
            ])
            ->add('role', EntityType::class, [
                'class' => Role::class, 
                'label' => 'Role ',
                'choice_label' => 'roleName',
                'expanded' => true,
                'attr' => ['class' => 'form-control'],
                'class'
                'query_builder' => function (UserRepository $userRepository) {
                    return $userRepository->createQueryBuilder('u')
                        ->where('u.roleTag != :adminRole')
                        ->setParameter('adminRole', 'ROLE_ADMIN');
                },
            ])
            ->add('team', EntityType::class, [
                'class' => Team::class,
                'label' => 'Team ',
                'choice_label' => 'teamName',
                'expanded' => true,
                'attr' => ['class' => 'form-control'],
                'required' => false
            ])
            ->add('password', PasswordType::class, [
                'empty_data' => '',
                'mapped' => false,
                'required' => false,
                'attr' => ['class' => 'form-control']
            ]);

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
            'data_class' => User::class,
        ]);
    }
}
