<?php
namespace Volleyball\Bundle\FacilityBundle\Controller;

class QuartersController extends \Volleyball\Bundle\UtilityBundle\Controller\Controller
{
    /**
     * Index action
     * @inheritdoc
     */
    public function indexAction(array $quarters)
    {
        return ['quarters' => $this->getQuarters()];
    }

    /**
     * New action
     * @inheritdoc
     */
    public function newAction()
    {
        $quarters = new \Volleyball\Bundle\FacilityBundle\Entity\Quarters();
        $form = $this->createBoundObjectForm($quarters, 'new');

        if ($form->isBound() && $form->isValid()) {
            $this->persist($quarters, true);
            $this->addFlash('quarters created');

            return $this->redirectToRoute('volleyball_quarters_index');
        }

        return ['form' => $form->createView()];
    }
    
    /**
     * Search action
     * @inheritdoc
     */
    public function searchAction(array $quarterss)
    {
        $quarters = new \Volleyball\Bundle\FacilityBundle\Entity\Quarters();
        $form = $this->createBoundObjectForm($quarters, 'search');
        
        if ($form->isBound() && $form->isValid()) {
            /** @TODO finish quarters search, also restrict access */
            $quarters = array();

            return ['quarters' => $quarterss];
        }

        return ['form' => $form->createView()];
    }
    
    /**
     * Show action
     * @inheritdoc
     */
    public function showAction(\Volleyball\Bundle\FacilityBundle\Entity\Quarters $quarters)
    {
        return ['quarters' => $quarters];
    }
}
