<?php
namespace Volleyball\Bundle\FacilityBundle\Entity;

class FacultyQuarters extends \Volleyball\Bundle\FacilityBundle\Entity\Quarters
{
    public function __construct()
    {
        parent::construct();
        
        $this->setType('faculty');
    }
}
