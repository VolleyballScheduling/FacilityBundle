<?php
namespace Volleyball\Bundle\FacilityBundle\Form\Type;

class FacilityFormType extends \Symfony\Component\Form\AbstractType
{
    public function buildForm(
        \Symfony\Component\Form\FormBuilderInterface $builder,
        array $options
    ) {
        $builder->add('name');
        $builder->add('organization');
        $builder->add('council');
        $builder->add('region');
        $builder->add('faculty');
    }

    public function getName()
    {
        return 'facility';
    }
}
