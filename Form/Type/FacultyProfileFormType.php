<?php
namespace Volleyball\Bundle\FacilityBundle\Form\Type;

class FacultyProfileFormType extends \FOS\UserBundle\Form\Type\ProfileFormType
{
    public function buildForm(
        \Symfony\Component\Form\FormBuilderInterface $builder,
        array $options
    ) {
        parent::buildForm($builder, $options);
    }
    
    public function getName()
    {
        return 'faculty_profile';
    }
}
