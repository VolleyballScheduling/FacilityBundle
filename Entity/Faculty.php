<?php
namespace Volleyball\Bundle\FacilityBundle\Entity;

use \Doctrine\Common\Collections\ArrayCollection;

class Faculty extends \Volleyball\Bundle\UserBundle\Entity\User
{
    /**
     * Position
     * @var \Volleyball\Bundle\ 
     */
    protected $position;
    
    /**
     * Enrollments
     * @var \Doctrine\Common\Collections\ArrayCollection
     */
    protected $enrollments;
    
    /**
     * Admin
     * @var boolean
     */
    protected $admin;
    
    /**
     * Consturct
     */
    public function __construct()
    {
        parent::construct();
        $this->enrollments = new ArrayCollection();
        $this->admin = false;
    }
    
    /**
     * Get position
     * @return \Volleyball\Bundle\FacilityBundle\Entity\Positon
     */
    public function getPosition()
    {
        return $this->position;
    }
    
    /**
     * Set position
     * @param \Volleyball\Bundle\FacilityBundle\Entity\Position $position
     * @return \Volleyball\Bundle\FacilityBundle\Entity\Faculty
     */
    public function setPosition(\Volleyball\Bundle\FacilityBundle\Entity\Position $position)
    {
        $this->position = $position;
        
        return $this;
    }
    
    /**
     * Get enrollments
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getEnrollments()
    {
        return $this->enrollments;
    }
    
    /**
     * Set enrollments
     * @param array $enrollments
     * @return \Volleyball\Bundle\FacilityBundle\Entity\Faculty
     */
    public function setEnrollments(array $enrollments)
    {
        if (!$enrollments instanceof \Doctrine\Common\Collections\ArrayCollection) {
            $enrollments = new ArrayCollection($enrollments);
        }
        
        $this->enrollments = $enrollments;
        
        return $this;
    }
    
    /**
     * Has enrollments
     * @return boolean
     */
    public function hasEnrollments()
    {
        return !$this->enrollments->isEmpty();
    }
    
    /**
     * Get enrollment
     * @param string $enrollment
     * @return \Volleyball\Bundle\EnrollmentBundle\Entity\FacultyEnrollment
     */
    public function getEnrollment($enrollment)
    {
        return $this->enrollments->get($enrollment);
    }
    
    /**
     * Add enrollment
     * @param \Volleyball\Bundle\EnrollmentBundle\Entity\FacultyEnrollment $enrollment
     * @return \Volleyball\Bundle\FacilityBundle\Entity\Faculty
     */
    public function addEnrollment(\Volleyball\Bundle\EnrollmentBundle\Entity\FacultyEnrollment $enrollment)
    {
        $this->enrollments->add($enrollment);
        
        return $this;
    }
    
    /**
     * Has enrollment
     * @param string $enrollment
     * @return boolean
     */
    public function hasEnrollment($enrollment)
    {
        return $this->enrollment->contains($enrollment);
    }
    
    /**
     * Remove enrollment
     * @param \Volleyball\Bundle\EnrollmentBundle\Entity\FacultyEnrollment $enrollment
     */
    public function removeEnrollment(\Volleyball\Bundle\EnrollmentBundle\Entity\FacultyEnrollment $enrollment)
    {
        $this->enrollments->remove($enrollment);
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
