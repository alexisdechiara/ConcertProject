<?php

namespace App\Form;

use App\Entity\Concert;
use App\Entity\Hall;
use App\Entity\Participate;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateIntervalType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class ConcertFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'required' => true,
            ])

            ->add('date', dateType::class, [
                'input_format' => 'dd/MM/yyyy',
                'widget' => 'single_text',
                'format' => 'dd/MM/yyyy',
                'html5' => false,
                'attr' => ['data-mdb-toggle' => 'datepicker'],
                'required' => true,
            ])

            ->add('time', DateTimeType::class, [
                'input_format' => 'HH:mm',
                'widget' => 'single_text',
                'format' => 'HH:mm',
                'html5' => false,
                'attr' => ['data-mdb-toggle' => 'timepicker'],
                'required' => true,
            ])

            ->add('duration', DateIntervalType::class, [
                'widget' => 'integer',
                'with_years'  => false,
                'with_months' => false,
                'with_days'   => false,
                'with_hours'  => true,
                'with_minutes' => true,
                'required' => false,
            ])
            ->add('description', TextAreaType::class, [
                'required' => false,
            ])
            ->add('coverFile', FileType::class, [
                'label' => 'Cover image',
                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new File([
                        'mimeTypes' => ["image/jpg", "image/jpeg", "image/png", "image/webp"],
                        'mimeTypesMessage' => "JPG, JPEG, PNG or WEBP accepted",
                    ])
                ],
            ])
            ->add('bannerFile', FileType::class, [
                'label' => 'Banner image',
                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new File([
                        'mimeTypes' => ["image/jpg", "image/jpeg", "image/png", "image/webp"],
                        'mimeTypesMessage' => "JPG, JPEG, PNG or WEBP accepted",
                    ])
                ],
            ])
            ->add('hall',  EntityType::class, [
                'class' => Hall::class,
                'choice_label' => 'name',
                'expanded' => false,
                'multiple' => false,
                'required' => true,
            ])
            ->add('participates', CollectionType::class, [
                'entry_type' => ParticipateFormType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
            ])
            ->add('submit', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Concert::class,
        ]);
    }
}
