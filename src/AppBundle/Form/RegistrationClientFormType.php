<?php

namespace AppBundle\Form;

use AppBundle\Entity\User\Client;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegistrationClientFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                    ->add("username")
                    ->add("name")
                    ->add("surname")
                    ->add("dni")
                    ->add('plainPassword', RepeatedType::class, array(
                            'type' => PasswordType::class,
                            'invalid_message' => 'The password fields must match.',
                            'options' => array('attr' => array('class' => 'password-field')),
                            'required' => true,
                            'first_options'  => array('label' => 'Password'),
                            'second_options' => array('label' => 'Repeat Password')))
                    ->add('email');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefault("data_class", Client::class);
    }

    public function getBlockPrefix()
    {
        return 'app_bundle_registration_client_form_type';
    }
}
