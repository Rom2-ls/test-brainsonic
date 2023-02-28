<?php

namespace App\Form;

use App\Entity\Billet;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BilletType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('passenger_firstname')
            ->add('passenger_lastname')
            ->add('passenger_sexe')
            ->add('company')
            ->add('destination')
            ->add('origin')
            ->add('date_hour_departure')
            ->add('date_hour_arrival')
            ->add('flight_number')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Billet::class,
        ]);
    }
}
