<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Role;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class User1Type extends AbstractType
{
    private $entityManager;
    private $passwordEncoder;
    private $security;

    public function __construct(Security $security, EntityManagerInterface $entityManager, UserPasswordHasherInterface $userPasswordHasher)
    {
        $this->security = $security;
        $this->entityManager = $entityManager;
        $this->passwordEncoder = $userPasswordHasher;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $roles = $this->entityManager->getRepository(Role::class)->findAll();
        $choices = [];
        foreach ($roles as $role) {
            // Assuming Role entity has properties 'id' and 'name', adjust if needed
            $choices[$role->getRoleName()] = $role->getRoleTag();
        }
        $builder
            ->add('email', null, [
                'label' => 'Email: ',
                'attr' => ['class' => 'form-control']
            ])

            ->add('role', EntityType::class, [
                'class' => Role::class,
                'label' => 'Role: ',
                'choice_label' => 'roleName',
                'expanded' => true,
                'attr' => ['class' => 'form-control'] // Apply a CSS class to the role field
            ]);

        if ($this->security->isGranted('ROLE_ADMIN')) {
            $this->addPasswordField($builder);
        }
    }

    private function addPasswordField(FormBuilderInterface $builder)
    {
        $builder->add('password', null, [
            'mapped' => false,
            'attr' => ['class' => 'form-control']
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
