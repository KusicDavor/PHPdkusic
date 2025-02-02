<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\VacationRequest;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Callback;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

class VacationRequestType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $user = $options['user'];

        $builder
            ->add('startDate', DateType::class, [
                'label' => 'Starting date',
                'constraints' => [
                    new Callback([$this, 'checkSelectedDateNotWeekend']),
                ],
            ])
            ->add('endDate', DateType::class, [
                'label' => 'Ending date',
                'constraints' => [
                    new Callback([$this, 'checkSelectedDateNotWeekend']),
                ],
            ])
            ->add('note');

        $builder->addEventListener(FormEvents::PRE_SUBMIT, function (FormEvent $event) {
            $formData = $event->getData();
            $startDate = $formData['startDate'];
            $endDate = $formData['endDate'];

            // Access the value of a specific field from the form data


            // You can then use $fieldValue as needed

            // For example, if you want to modify the form based on the field value
            // $form = $event->getForm();
            // $form->add('anotherField', AnotherFieldType::class);
        });
    }

    public function checkSelectedDateNotWeekend($date, ExecutionContextInterface $context)
    {
        $dateTime = new \DateTime($date->format('Y-m-d'));

        // N je dan u tjednu
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
