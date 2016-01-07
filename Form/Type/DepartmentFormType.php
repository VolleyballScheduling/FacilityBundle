<?php
namespace Volleyball\Bundle\FacilityBundle\Form\Type;

class DepartmentFormType extends \Symfony\Component\Form\AbstractType
{
    public function buildForm(
        \Symfony\Component\Form\FormBuilderInterface $builder,
        array $options
    ) {
        $builder->add('name');
        $builder->add('avatar', 'file');
        $builder->add('facility');
    }

    public function getName()
    {
        return 'department';
    }
}
