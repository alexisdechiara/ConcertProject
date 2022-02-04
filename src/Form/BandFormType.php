<?php

namespace App\Form;

use App\Entity\Artist;
use App\Entity\Band;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BandFormType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'required' => true,
            ])
            ->add('description', TextareaType::class, [
                'required' => 'false',
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
            ->add('artists', EntityType::class, [
                'class' => Artist::class,
                'choice_label' => 'stageName',
                'expanded' => false,
                'multiple' => true,
                ])
            ->add('submit', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Band::class,
        ]);
    }
}
