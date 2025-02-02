<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Role;
use App\Entity\Team;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class UserType extends AbstractType
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $user = $builder->getData();
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


        if (empty($builder['team'])) {
            return;
        }

        $userRepository = $this->entityManager->getRepository(Role::class);
        $approverRoles = $userRepository->findApproverRoles();

        foreach ($approverRoles as $role) {
            if ($user->getRole()->getId() == $role->getId()) {
                $builder
                    ->add('agreeTerms', CheckboxType::class, [
                        'label' => 'I agree to the terms and conditions', // Label for the checkbox
                        'required' => true, // Mark the checkbox as required
                    ]);
            }
        }
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
