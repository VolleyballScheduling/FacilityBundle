<?php
namespace Volleyball\Bundle\FacilityBundle\Controller;

class FacultyController extends \Volleyball\Bundle\UtilityBundle\Controller\Controller
{
    /**
     * Index action
     * @inheritdoc
     */
    public function indexAction(array $faculty)
    {
        return ['faculty' => $this->getFaculty()];
    }

    /**
     * New action
     * @inheritdoc
     */
    public function newAction()
    {
        $faculty = new \Volleyball\Bundle\FacilityBundle\Entity\Faculty();
        $form = $this->createBoundObjectForm($faculty, 'new');

        if ($form->isBound() && $form->isValid()) {
            $this->persist($faculty, true);
            $this->addFlash('faculty created');

            return $this->redirectToRoute('volleyball_faculty_index');
        }

        return ['form' => $form->createView()];
    }
    
    /**
     * Search action
     * @inheritdoc
     */
    public function searchAction(array $faculty)
    {
        $faculty = new \Volleyball\Bundle\FacilityBundle\Entity\Faculty();
        $form = $this->createBoundObjectForm($faculty, 'search');
        
        if ($form->isBound() && $form->isValid()) {
            /** @TODO finish faculty search, also restrict access */
            $faculty = array();

            return ['faculty' => $faculty];
        }

        return ['form' => $form->createView()];
    }
    
    /**
     * Show action
     * @inheritdoc
     */
    public function showAction(\Volleyball\Bundle\FacilityBundle\Entity\Faculty $faculty)
    {
        return ['faculty' => $faculty];
    }
}
