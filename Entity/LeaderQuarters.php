<?php
namespace Volleyball\Bundle\FacilityBundle\Entity;

class LeaderQuarters extends \Volleyball\Bundle\FacilityBundle\Entity\Quarters
{
    public function __construct()
    {
        parent::construct();
        
        $this->setType('leader');
    }
}
