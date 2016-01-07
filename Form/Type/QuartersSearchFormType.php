<?php
namespace Volleyball\Bundle\FacilityBundle\Form\Type;

class QuartersSearchFormType extends \Volleyball\Bundle\UtilityBundle\Form\Type\SearchFormType
{
    public function buildForm(\Symfony\Component\Form\FormBuilderInterface $builder, array $options)
    {
        $builder->add('name');
    }
    
    public function setDefaultOptions(\Symfony\Component\OptionsResolver\OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Volleyball\Bundle\FacilityBundle\Entity\Quarters'
        ));
    }

    public function getName()
    {
        return 'quarters_search';
    }
}
