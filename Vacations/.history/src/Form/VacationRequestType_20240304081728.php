<?php

namespace App\Form;

use App\Entity\VacationRequest;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

class VacationRequestType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $user = $options['user'];

        $builder
            ->add('startDate')
            ->add('endDate')
            ->add('note');
    }

    public function checkSelectedDateNotWeekend($date, ExecutionContextInterface $context)
    {
        // Convert the selected date to a DateTime object
        $dateTime = new \DateTime($date->format('Y-m-d'));

        // Check if the selected date is on a Saturday or Sunday (weekend)
        if ($dateTime->format('N') >= 6) {
            $context->buildViolation('Selected date cannot be on a weekend.')
                ->addViolation();
        }
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => VacationRequest::class,
            'user' => null,
        ]);
    }
}
