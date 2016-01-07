<?php
namespace Volleyball\Bundle\FacilityBundle\Form\Type;

class FacultySearchFormType extends \Volleyball\Bundle\UtilityBundle\Form\Type\SearchFormType
{
    public function buildForm(\Symfony\Component\Form\FormBuilderInterface $builder, array $options)
    {
        $builder->add('first_name');
        $builder->add('last_name');
    }

    public function setDefaultOptions(\Symfony\Component\OptionsResolver\OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Volleyball\Bundle\FacilityBundle\Entity\Faculty'
        ));
    }

    public function getName()
    {
        return 'faculty_search';
    }
}
