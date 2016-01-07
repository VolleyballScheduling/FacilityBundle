<?php
namespace Volleyball\Bundle\FacilityBundle\Form\Type;

class FacultyRegistrationFormType extends \FOS\UserBundle\Form\Type\RegistrationFormType
{
    public function buildForm(
        \Symfony\Component\Form\FormBuilderInterface $builder,
        array $options
    ) {
            parent::buildForm($builder, $options);

            $builder->add('facility');
    }
    
    public function getParent()
    {
        return 'fos_user_registration';
    }

    public function getName()
    {
        return 'faculty_registration';
    }
}
