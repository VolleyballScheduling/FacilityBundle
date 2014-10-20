<?php
namespace Volleyball\Bundle\FacilityBundle\Entity;

class AttendeeQuarters extends Quarters
{
    public function __construct()
    {
        $this->setType('attendee');
    }
}
