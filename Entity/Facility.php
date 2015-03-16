<?php
namespace Volleyball\Bundle\FacilityBundle\Entity;

use \Doctrine\Common\Collections\ArrayCollection;

use \Volleyball\Bundle\UtilityBundle\Traits\SluggableTrait;
use \Volleyball\Bundle\UtilityBundle\Traits\TimestampableTrait;

/**
 * @ORM\Entity
 * @ORM\Table(name="facility")
 */
class Facility
{
    use SluggableTrait;
    use TimestampableTrait;

    /**
     * Id
     * @var integer
     */
    protected $id;
    
    /**
     * Name
     * @var string
     */
    protected $name;
    
    /**
     * Address
     * @var \Volleyball\Bundle\CoreBundle\Entity\Address
     */
    protected $address;
    
    /**
     * Organization
     * @var \Volleyball\Bundle\OrganizationBundle\Entity\Organization
     */
    protected $organization;
    
    /**
     * Council
     * @var \Volleyball\Bundle\OrganizationBundle\Entity\Council
     */
    protected $council;
    
    /**
     * Region
     * @var \Volleyball\Bundle\OrganizationBundle\Entity\Region
     */
    protected $region;
    
     /**
      * Faculty
      * @var \Doctrine\Common\Collections\ArrayCollection
      */
    protected $faculty;
    
    /**
     * Quarters
     * @var \Doctrine\Common\Collections\ArrayCollection
     */
    protected $quarters;
    
    /**
     * Departments
     * @var \Doctrine\Common\Collections\ArrayCollection
     */
    protected $departments;
    
    /**
     * Season
     * @var \Doctrine\Common\Collections\ArrayCollection
     */
    protected $seasons;

    /**
     * Get id
     * @return integer Id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get name
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set name
     * @param string $name
     * @return \Volleyball\Bundle\FacilityBundle\Entity\Facility
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get address
     * @return \VolleyballBundle\CoreBundle\Entity\Address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set address
     * @param \Volleyball\Bundle\CoreBundle\Entity\Address $address
     * @return \Volleyball\Bundle\FacilityBundle\Entity\Facility
     */
    public function setAddress(\Volleyball\Bundle\CoreBundle\Entity\Address $address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get organization
     * @return \Volleyball\Bundle\OrganizationBundle\Entity\Organization
     */
    public function getOrganization()
    {
        return $this->organization;
    }

    /**
     * Set organization
     * @param \Volleyball\Bundle\OrganizationBundle\Entity\Organization $organization
     * @return \Volleyball\Bundle\FacilityBundle\Entity\Facility
     */
    public function setOrganization(\Volleyball\Bundle\OrganizationBundle\Entity\Organization $organization)
    {
        $this->organization = $organization;

        return $this;
    }

    /**
     * Get council
     * @return \Volleyball\Bundle\OrganizationBundle\Entity\Council
     */
    public function getCouncil()
    {
        return $this->council;
    }

    /**
     * Set council
     * @param \Volleyball\Bundle\OrganizationBundle\Entity\Council $council
     * @return \Volleyball\Bundle\FacilityBundle\Entity\Facility
     */
    public function setCouncil(\Volleyball\Bundle\OrganizationBundle\Entity\Council $council)
    {
        $this->council = $council;

        return $this;
    }

    /**
     * Get reigon
     * @return \Volleyball\Bundle\OrganizationBundle\Entity\Region
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * Set region
     * @param \Volleyball\Bundle\OrganizationBundle\Entity\Region $region
     * @return \Volleyball\Bundle\FacilityBundle\Entity\Facility
     */
    public function setRegion(\Volleyball\Bundle\OrganizationBundle\Entity\Region $region)
    {
        $this->region = $region;

        return $this;
    }

    /**
     * Set facility
     * @param array $faculty
     * @return \Volleyball\Bundle\FacilityBundle\Entity\Facility
     */
    public function setFaculty(array $faculty)
    {
        if (!$faculty instanceof ArrayCollection) {
            $faculty = new ArrayCollection($faculty);
        }

        $this->faculty = $faculty;

        return $this;
    }

    /**
     * Has faculty
     * @return boolean
     */
    public function hasFaculty()
    {
        return !$this->faculty->isEmpty();
    }

    /**
     * Get faculty
     * @param string|null $faculty
     * @return \Doctrine\Common\Collections\ArrayCollection|\Volleyball\Bundle\FacilityBundle\Entity\Faculty
     */
    public function getFaculty($faculty = null)
    {
        if (null == $faculty) {
            return $this->faculty;
        }

        return $this->faculty->get($faculty);
    }

    /**
     * Add faculty
     * @param \Volleyball\Bundle\FacilityBundle\Entity\Faculty $faculty
     * @return \Volleyball\Bundle\FacilityBundle\Entity\Facility
     */
    public function addFaculty(\Volleyball\Bundle\FacilityBundle\Entity\Faculty $faculty)
    {
        $this->faculty->add($faculty);

        return $this;
    }

    /**
     * Remove faculty
     * @param \Volleyball\Bundle\FacilityBundle\Entity\Faculty $faculty
     */
    public function removeFaculty(\Volleyball\Bundle\FacilityBundle\Entity\Faculty $faculty)
    {
        $this->faculty->remove($faculty);
    }

    /**
     * Get quarters
     * @param string|null $quarters
     * @param string| $type
     * @return \Doctrine\Common\Collections\ArrayCollection|\Volleyball\Bundle\FacilityBundle\Entity\Quarters
     */
    public function getQuarters($quarters = null, $type = null)
    {
        // quarters specified
        if (null != $quarters) {
            return $this->quarters->get($quarters);
        }
        
        // quarters type specified
        if (null != $type) {
            return $this->quarters->filter(
                function($entry) use($type) {
                    return in_array($entry->getType(), array($type));
                }
            );
        }

        return $this->quarters;
    }
    
    /**
     * Set quarters
     * @param array $quarters
     * @return \Volleyball\Bundle\FacilityBundle\Entity\Facility
     */
    public function setQuarters(array $quarters)
    {
        if (!$quarters instanceof ArrayCollection) {
            $quarters = new ArrayCollection($quarters);
        }
        
        $this->quarters = $quarters;

        return $this;
    }
    
    /**
     * Add quarters
     * @param \Volleyball\Bundle\FacilityBundle\Entity\Quarters $quarters
     * @return \Volleyball\Bundle\FacilityBundle\Entity\Facility
     */
    public function addQuarters(\Volleyball\Bundle\FacilityBundle\Entity\Quarters $quarters)
    {
        $this->quarters->add($quarters);
        
        return $this;
    }
    
    /**
     * Remove quarters
     * @param \Volleyball\Bundle\FacilityBundle\Entity\Quarters $quarters
     */
    public function removeQuarters(\Volleyball\Bundle\FacilityBundle\Entity\Quarters $quarters)
    {
        $this->quarters->remove($quarters);
    }

    /**
     * Get departments
     * @return \Doctrine\Common\Collecitons\ArrayCollection
     */
    public function getDepartments()
    {
        return $this->departments;
    }

    /**
     * Set departments
     * @param array $departments
     * @return \Volleyball\Bundle\FacilityBundle\Entity\Facility
     */
    public function setDepartments(array $departments)
    {
        if (! $departments instanceof ArrayCollection) {
            $departments = new ArrayCollection($departments);
        }

        $this->departments = $departments;

        return $this;
    }

    /**
     * Has departments
     * @return boolean
     */
    public function hasDepartments()
    {
        return !$this->departments->isEmpty();
    }

    /**
     * Get department
     * @param string $department
     * @return \Volleyball\Bundle\FacilityBundle\Entity\Department
     */
    public function getDepartment($department)
    {
        return $this->departments->get($department);
    }

    /**
     * Add department
     * @param \Volleyball\Bundle\FacilityBundle\Entity\Department $department
     * @return \Volleyball\Bundle\FacilityBundle\Entity\Facility
     */
    public function addDepartment(\Volleyball\Bundle\FacilityBundle\Entity\Department $department)
    {
        $this->departments->add($department);

        return $this;
    }

    /**
     * Remove department
     * @param \Volleyball\Bundle\FacilityBundle\Entity\Department $department
     */
    public function removeDepartment(\Volleyball\Bundle\FacilityBundle\Entity\Department $department)
    {
        $this->departments->remove($department);
    }

    /**
     * @inheritdoc
     */
    public function getSeasons()
    {
        return $this->seasons;
    }

    /**
     * Get seasons
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getSeasons()
    {
        return $this->seasons;
    }
    
    /**
     * Set seasons
     * @param array $seasons
     * @return \Volleyball\Bundle\FacilityBundle\Entity\Facility
     */
    public function setSeasons(array $seasons)
    {
        if (! $seasons instanceof ArrayCollection) {
            $seasons = new ArrayCollection($seasons);
        }

        $this->seasons = $seasons;

        return $this;
    }

    /**
     * Has seasons
     * @return boolean
     */
    public function hasSeasons()
    {
        return !$this->seasons->isEmpty();
    }
    
    /**
     * Get season
     * @param string $season
     * @return \Volleyball\Bundle\EnrollmentBundle\Entity\Season
     */
    public function getSeason($season)
    {
        return $this->seasons->get($season);
    }

    /**
     * Add season
     * @param \Volleyball\Bundle\EnrollmentBundle\Entity\Season $season
     * @return \Volleyball\Bundle\FacilityBundle\Entity\Facility
     */
    public function addSeason(\Volleyball\Bundle\EnrollmentBundle\Entity\Season $season)
    {
        $this->seasons->add($season);

        return $this;
    }

    /**
     * Remove season
     * @param \Volleyball\Bundle\EnrollmentBundle\Entity\Season $season
     */
    public function removeSeason(\Volleyball\Bundle\EnrollmentBundle\Entity\Season $season)
    {
        $this->seasons->remove($season);
    }

    /**
     * Construct
     */
    public function __construct()
    {
        $this->faculty = new ArrayCollection();
        $this->departments = new ArrayCollection();
        $this->quarters = new ArrayCollection();
        $this->seasons = new ArrayCollection();
    }
}
