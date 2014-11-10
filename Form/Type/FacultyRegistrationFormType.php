<?php
namespace Volleyball\Bundle\FacilityBundle\Form\Type;

class FacultyRegistrationFormType extends \Symfony\Component\Form\AbstractType
{
    public function buildForm(\Symfony\Component\Form\FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        // add your custom field
        $builder->add(
            'quarters',
            'entity',
            array(
                'property'  =>  'name',
                'class'     => 'Volleyball\Bundle\FacilityBundle\Entity\FacultyQuarters',
                'required'  => false
            )
        );
    }
    
    public function getParent()
    {
        return 'fos_user_registration';
    }

    public function getName()
    {
        return 'volleyball_faculty_registration_form';
    }
}
