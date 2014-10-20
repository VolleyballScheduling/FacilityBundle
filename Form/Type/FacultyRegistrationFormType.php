<?php

namespace Volleyball\Bundle\FacilityBundle\Form\Type;

use ,


class FacultyRegistrationFormType extends \FOS\UserBundle\Form\Type\RegistrationFormType
{
    public function buildForm(\Symfony\Component\Form\FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        // add your custom field
        $builder->add('quarters',
                      'entity',
                      array(
                        'property'  =>  'name',
                        'class'     => 'Volleyball\Bundle\FacilityBundle\Entity\FacultyQuarters',
                        'required'  => false
        ) );
    }

    public function getName()
    {
        return 'volleyball_faculty_registration_form';
    }
}
