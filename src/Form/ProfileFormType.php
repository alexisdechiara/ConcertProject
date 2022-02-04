<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class ProfileFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder    ->add('email', EmailType::class, [
                        'label' => 'Email'
                    ])
                    ->add('firstName', TextType::class, [
                        'label' =>'First name'
                    ])
                    ->add('lastName', TextType::class, [
                        'label' =>'Last name'
                    ])
                    ->add('password', PasswordType::class, [
                        'always_empty' => true,
                        'label' => 'Password',
                        'attr' => ['autocomplete' => 'new-password'],
                        'constraints' => [
                            new NotBlank([
                                'message' => 'Please enter a password',
                            ]),
                            new Length([
                                'min' => 6,
                                'minMessage' => 'Your password should be at least {{ limit }} characters',
                                // max length allowed by Symfony for security reasons
                                'max' => 4096,
                            ]),
                        ]
                    ])
                    ->add('profileImage', FileType::class, [
                        'label' => 'Profile Image',
                        'mapped' => false,
                        'required' => false,
                    ])
                    ->add('submit', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
