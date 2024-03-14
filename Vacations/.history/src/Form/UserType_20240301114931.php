<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Role;
use App\Entity\Team;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
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

/** @var EntityManagerInterface $entityManager */
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
                'attr' => ['class' => 'form-control']
            ])
            ->add('team', EntityType::class, [
                'class' => Team::class,
                'label' => 'Team ',
                'choice_label' => 'teamName',
                'expanded' => true,
                'required' => false,
                'attr' => ['class' => 'form-control']

            ])
            ->add('password', PasswordType::class, [
                'empty_data' => '',
                'mapped' => false,
                'required' => false,
                'attr' => ['class' => 'form-control']
            ]);

        $builder->addEventListener(FormEvents::PRE_SUBMIT, function (FormEvent $event) {
            $user = $event->getData();
            $form = $event->getForm();

            $userRepository = $entityManager->getRepository(User::class);
            $nonAdminRoles = $userRepository->findAllNonAdminRoles();

            if ($user['role'] == '1' || $user['role'] == '2') {
                $form->addError(new FormError('The team leader and project leader cannot be the same user.'));
            }

            // if ($teamLeader === $projectLeader && ($teamLeader != null && $projectLeader != null)) {
            //     $form->addError(new FormError('The team leader and project leader cannot be the same user.'));
            // }
        });
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
