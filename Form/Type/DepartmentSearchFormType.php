<?php
namespace Volleyball\Bundle\FacilityBundle\Form\Type;

class DepartmentSearchFormType extends \Volleyball\Bundle\UtilityBundle\Form\Type\SearchFormType
{
    public function buildForm(\Symfony\Component\Form\FormBuilderInterface $builder, array $options)
    {
        $builder->add('name');
    }
    
    public function setDefaultOptions(\Symfony\Component\OptionsResolver\OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Volleyball\Bundle\FacilityBundle\Entity\Department'
        ));
    }

    public function getName()
    {
        return 'department_search';
    }
}
