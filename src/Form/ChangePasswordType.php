<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class ChangePasswordType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'disabled' => true,
                'label' => 'email'
            ])
            ->add('firstname', TextType::class, [
                'disabled' => true,
                'label' => 'firstname'
            ])
            ->add('lastname', TextType::class, [
                'disabled' => true,
                'label' => 'lastname'
            ])
            ->add('old_password', PasswordType::class, [
                'label' => 'current password',
                'mapped' => false,
                'attr' => [
                    'placeholder' => 'Please enter your current password'
                ]
            ])
            ->add('new_password', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'Passwords must be identical',
                'options' => ['attr' => ['class' => 'password-field']],
                'required' => true,
                'first_options'  => [
                    'label' => 'New Password',
                    'attr' => ['placeholder' => 'Enter new New Password']
                ],
                'second_options' => [
                    'label' => 'repeat password',
                    'attr' => ['placeholder' => 'confirm password ']
                ],
                'mapped' => false,
                'attr' => [
                    'autocomplete' => 'new-password'
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Length([
                        'min' => 4,
                        'minMessage' => 'Your password must contain at least 8 characters',
                        'max' => 4096,
                    ]),
                ],
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Save Changes',
                'attr' => [
                    'class' => 'btn btn-outline-success'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
