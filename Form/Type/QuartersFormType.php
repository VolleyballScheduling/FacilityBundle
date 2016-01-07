<?php
namespace Volleyball\Bundle\FacilityBundle\Form\Type;

class QuartersFormType extends \Symfony\Component\Form\AbstractType
{
    public function buildForm(
        \Symfony\Component\Form\FormBuilderInterface $builder,
        array $options
    ) {
        $builder->add('name');
        $builder->add('type');
        $builder->add('facility');
    }

    public function getName()
    {
        return 'quarters';
    }
}
