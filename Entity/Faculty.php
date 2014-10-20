<?php
namespace Volleyball\Bundle\FacilityBundle\Entity;

use \Doctrine\ORM\Mapping as ORM;
use \Gedmo\Mapping\Annotation as Gedmo;
use \Symfony\Component\Validator\Constraints as Assert;
use \PUGX\MultiUserBundle\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity
 * @ORM\Table(name="faculty")
 * @UniqueEntity(fields = "username", targetClass = "Volleyball\Bundle\UserBundle\Entity\User", message="fos_user.username_already")
 * @UniqueEntity(fields = "email", targetClass = "Volleyball\Bundle\UserBundle\Entity\User", message="fos_user.email_already")
 */
class Faculty extends\Volleyball\Bundle\UserBundle\Entity\User implements \Volleyball\Component\Facility\Interfaces\FacultyInterface
{
    /**
     * @ORM\ManyToOne(targetEntity="Volleyball\Bundle\FacilityBundle\Entity\Position", inversedBy="faculty")
     * @ORM\JoinColumn(name="position_id", referencedColumnName="id")
     */
    protected $position;
    
    /**
     * @ORM\ManyToOne(targetEntity="Volleyball\Bundle\FacilityBundle\Entity\Facility", inversedBy="facility")
     * @ORM\JoinColumn(name="facility_id", referencedColumnName="id")
     */
    protected $facility;
    
    /**
     * Admin - if true, user can make limited changes to the passel
     * @var boolean
     */
    protected $admin = false;
    
    /**
     * Quarters
     * @var \Volleyball\Bundle\FacilityBundle\Entity\FacultyQuarters 
     */
    protected $quarters;

    /**
     * @inheritdoc
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @inheritdoc
     */
    public function setPosition(Position $position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getFacility()
    {
        return $this->facility;
    }

    /**
     * @inheritdoc
     */
    public function setFacility(Facility $facility)
    {
        $this->facility = $facility;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getQuarters($type)
    {
        return $this->quarters->filterByType($type);
    }

    /**
     * @inheritdoc
     */
    public function setQuarters(Quarters $quarters)
    {
        $this->quarters = $quarters;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function isAdmin($admin = null)
    {
        if (null != $admin) {
            $this->admin = $admin;

            return $this;
        }

        return $this->admin;
    }
}
