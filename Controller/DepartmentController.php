<?php
namespace Volleyball\Bundle\FacilityBundle\Controller;

class DepartmentController extends \Volleyball\Bundle\UtilityBundle\Controller\Controller
{
    /**
     * Index action
     * @inheritdoc
     */
    public function indexAction(array $departments)
    {
        return ['departments' => $this->getDepartments()];
    }

    /**
     * New action
     * @inheritdoc
     */
    public function newAction()
    {
        $department = new \Volleyball\Bundle\FacilityBundle\Entity\Department();
        $form = $this->createBoundObjectForm($department, 'new');

        if ($form->isBound() && $form->isValid()) {
            $this->persist($department, true);
            $this->addFlash('department created');

            return $this->redirectToRoute('volleyball_departments_index');
        }

        return ['form' => $form->createView()];
    }
    
    /**
     * Search action
     * @inheritdoc
     */
    public function searchAction(array $departments)
    {
        $department = new \Volleyball\Bundle\FacilityBundle\Entity\Department();
        $form = $this->createBoundObjectForm($department, 'search');
        
        if ($form->isBound() && $form->isValid()) {
            /** @TODO finish department search, also restrict access */
            $departments = array();

            return ['departments' => $departments];
        }

        return ['form' => $form->createView()];
    }
    
    /**
     * Show action
     * @inheritdoc
     */
    public function showAction(\Volleyball\Bundle\FacilityBundle\Entity\Department $department)
    {
        return ['department' => $department];
    }


}
