<?php
namespace Volleyball\Bundle\FacilityBundle\Controller;

class FacilityController extends \Volleyball\Bundle\UtilityBundle\Controller\Controller
{
    /**
     * Index action
     * @inheritdoc
     */
    public function indexAction(array $facilities)
    {
        return ['facilities' => $this->getFacilities()];
    }

    /**
     * New action
     * @inheritdoc
     */
    public function newAction()
    {
        $facility = new \Volleyball\Bundle\FacilityBundle\Entity\Facility();
        $form = $this->createBoundObjectForm($facility, 'new');

        if ($form->isBound() && $form->isValid()) {
            $this->persist($facility, true);
            $this->addFlash('facility created');

            return $this->redirectToRoute('volleyball_facilities_index');
        }

        return ['form' => $form->createView()];
    }
    
    /**
     * Search action
     * @inheritdoc
     */
    public function searchAction(array $facilities)
    {
        $facility = new \Volleyball\Bundle\FacilityBundle\Entity\Facility();
        $form = $this->createBoundObjectForm($facility, 'search');
        
        if ($form->isBound() && $form->isValid()) {
            /** @TODO finish facility search, also restrict access */
            $facilities = array();

            return ['facilities' => $facilities];
        }

        return ['form' => $form->createView()];
    }
    
    /**
     * Show action
     * @inheritdoc
     */
    public function showAction(\Volleyball\Bundle\FacilityBundle\Entity\Facility $facility)
    {
        return ['facility' => $facility];
    }


}
