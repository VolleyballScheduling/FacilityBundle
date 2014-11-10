<?php
namespace Volleyball\Bundle\FacilityBundle\Entity;

use \Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="attendee_quarters")
 */
class AttendeeQuarters extends \Volleyball\Bundle\FacilityBundle\Entity\Quarters
{
    public function __construct()
    {
        parent::construct();
        
        $this->setType('attendee');
    }
}
