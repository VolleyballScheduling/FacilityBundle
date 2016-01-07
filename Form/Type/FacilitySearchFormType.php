<?php
namespace Volleyball\Bundle\FacilityBundle\Form\Type;

class FacilitySearchFormType extends \Volleyball\Bundle\UtilityBundle\Form\Type\SearchFormType
{
    public function buildForm(\Symfony\Component\Form\FormBuilderInterface $builder, array $options)
    {
        $builder->add('name');
        $builder->add('type');
    }

    public function getName()
    {
        return 'facility_search';
    }
}
