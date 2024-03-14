<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Role;
use App\Entity\Team;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class UserType extends AbstractType
{
    private $entityManager;
    private $passwordEncoder;
    private $security;

    public function __construct(Security $security, EntityManagerInterface $entityManager)
    {
        $this->security = $security;
        $this->entityManager = $entityManager;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Name: ',
                'attr' => ['class' => 'form-control']
            ])
            ->add('email', null, [
                'label' => 'Email: ',
                'attr' => ['class' => 'form-control']
            ])
            ->add('job', TextType::class, [
                'label' => 'Job: ',
                'attr' => ['class' => 'form-control']
            ])
            ->add('vacationDays', IntegerType::class, [
                'label' => 'Number of vacation days: ',
                'attr' => ['class' => 'form-control']
            ])
            ->add('team', EntityType::class, [
                'class' => Team::class,
                'label' => 'Team: ',
                'choice_label' => 'teamName',
                'expanded' => true,
                'attr' => ['class' => 'form-control']
            ])
            ->add('role', EntityType::class, [
                'class' => Role::class,
                'label' => 'Role: ',
                'choice_label' => 'roleName',
                'expanded' => true,
                'attr' => ['class' => 'form-control']
            ])

            ->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) {
                $form = $event->getForm();
                $user = $event->getData();
            };

        if ($this->security->isGranted('ROLE_ADMIN')) {
            $this->addPasswordField($builder);
        }
    }

    private function addPasswordField(FormBuilderInterface $builder)
    {
        $builder->add('password', null, [
            'empty_data' => '',
            'mapped' => false,
            'required' => false,
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
