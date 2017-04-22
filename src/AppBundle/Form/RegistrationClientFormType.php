<?php

namespace AppBundle\Form;

use AppBundle\Entity\User\Client;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegistrationClientFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                    ->add("name")
                    ->add("surname")
                    ->add("dni");
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
