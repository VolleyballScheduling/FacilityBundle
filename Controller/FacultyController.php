<?php
namespace Volleyball\Bundle\FacilityBundle\Controller;

use \Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use \Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use \Symfony\Component\HttpFoundation\Request;

class FacultyController extends \Volleyball\Bundle\UtilityBundle\Controller\UtilityController
{
    public function registerAction(Request $request)
    {
        return $this
                ->container
                ->get('pugx_multi_user.registration_manager')
                ->register('Volleyball\Bundle\FacilityBundle\Entity\Faculty');
    }
}
