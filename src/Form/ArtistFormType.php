<?php

namespace App\Form;

use App\Entity\Artist;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArtistFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('stageName', TextType::class, [
                'label' => 'Stage name',
                'required' => true,
            ])
            ->add('firstName', TextType::class, [
                'label' => 'First name',
                'required' => false,
            ])
            ->add('lastName', TextType::class, [
                'label' => 'First name',
                'required' => false,
            ])
            ->add('role', ChoiceType::class, [
                'choices' => [
                    'Singer' => 'singer',
                    'Musician' => 'musician',
                ]
            ])
            ->add('picture', TextType::class, [
                'required' => false,
            ])
            ->add('gender', ChoiceType::class, [
                'choices' => [
                    'Man' => 1,
                    'Woman' => 2,
                    'Other' => 0
                ],
                'expanded' => true,
                'multiple' => false,
                'data' => 0,
            ])
            ->add('birthDay', DateType::Class, [
                'input_format' => 'dd/MM/yyyy',
                'widget' => 'single_text',
                'format' => 'dd/MM/yyyy',
                'html5' => false,
                'attr' => ['data-mdb-toggle' => 'datepicker'],
                'required' => false,
            ])
            ->add('submit', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Artist::class,
        ]);
    }
}
