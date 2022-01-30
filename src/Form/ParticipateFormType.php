<?php

namespace App\Form;

use App\Entity\Band;
use App\Entity\Concert;
use App\Entity\Hall;
use App\Entity\Participate;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateIntervalType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ParticipateFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('runningPassage')
            ->add('isMainBand',  CheckboxType::class, [
                'attr' => ['class' => 'form-check-input appearance-none w-9 -ml-10 rounded-full float-left h-5 align-top bg-white bg-no-repeat bg-contain bg-gray-300 focus:outline-none cursor-pointer shadow-sm', 'role' => "switch", 'id'=>"flexSwitchCheckDefault"],
                'label_attr' => ['class' => 'form-check-label ml-2']
            ])
            ->add('duration', DateIntervalType::class, [
                'widget' => 'integer',
                'with_years' => false,
                'with_months' => false,
                'with_days' => false,
                'with_hours' => true,
                'with_minutes' => true,
                'labels' => [
                    'hours' => null,
                    'minutes' => null,
                ],
                'required' => false,
            ])
            ->add('concert',  EntityType::class, [
                'class' => Concert::class,
                'choice_label' => 'name',
                'expanded' => false,
                'multiple' => false,
            ])
            ->add('band',  EntityType::class, [
                'class' => Band::class,
                'choice_label' => 'name',
                'expanded' => false,
                'multiple' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Participate::class,
        ]);
    }
}
