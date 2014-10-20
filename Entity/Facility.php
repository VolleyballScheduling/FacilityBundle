<?php
namespace Volleyball\Bundle\FacilityBundle\Entity;

use \Doctrine\ORM\Mapping as ORM;
use \Gedmo\Mapping\Annotation as Gedmo;
use \Symfony\Component\Validator\Constraints as Assert;
use \Doctrine\Common\Collections\ArrayCollection;

use \Volleyball\Bundle\UtilityBundle\Traits\SluggableTrait;
use \Volleyball\Bundle\UtilityBundle\Traits\TimestampableTrait;

/**
 * @ORM\Entity
 * @ORM\Table(name="facility")
 */
class Facility implements \Volleyball\Component\Facility\Interfaces\FacilityInterface
{
    use SluggableTrait;
    use TimestampableTrait;

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * Name
     * @var  string name
     * @ORM\Column(name="name", type="string")
     */
    protected $name = '';
    
    /**
     * @ORM\ManyToOne(targetEntity="Volleyball\Bundle\UtilityBundle\Entity\Address", inversedBy="facility")
     * @ORM\JoinColumn(name="address_id", referencedColumnName="id")
     */
    protected $address;
    
    /**
     * @ORM\ManyToOne(targetEntity="Volleyball\Bundle\OrganizationBundle\Entity\Organization", inversedBy="facility")
     * @ORM\JoinColumn(name="organization_id", referencedColumnName="id")
     */
    protected $organization;
    
    /**
     * @ORM\ManyToOne(targetEntity="Volleyball\Bundle\OrganizationBundle\Entity\Council", inversedBy="facility")
     * @ORM\JoinColumn(name="council_id", referencedColumnName="id")
     */
    protected $council;
    
    /**
     * @ORM\ManyToOne(targetEntity="Volleyball\Bundle\OrganizationBundle\Entity\Region", inversedBy="facility")
     * @ORM\JoinColumn(name="region_id", referencedColumnName="id")
     */
    protected $region;
    
     /**
     * @ORM\OneToMany(targetEntity="Faculty", mappedBy="facility")
     */
    protected $faculty;
    
    /**
     * @ORM\ManyToOne(targetEntity="Volleyball\Bundle\FacilityBundle\Entity\Quarters", inversedBy="facility")
     * @ORM\JoinColumn(name="quarters_id", referencedColumnName="id")
     */
    protected $quarters;
    
    /**
     * @ORM\ManyToOne(targetEntity="Volleyball\Bundle\FacilityBundle\Entity\Department", inversedBy="facility")
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id")
     */
    protected $departments;
    
    /**
     * @ORM\ManyToOne(targetEntity="Volleyball\Bundle\EnrollmentBundle\Entity\Season", inversedBy="facility")
     * @ORM\JoinColumn(name="season_id", referencedColumnName="id")
     */
    protected $seasons;

    /**
     * Get id
     *
     * @return integer Id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @inheritdoc
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @inheritdoc
     */
    public function setAddress(\Volleyball\Bundle\UtilityBundle\Entity\Address $address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getOrganization()
    {
        return $this->organization;
    }

    /**
     * @inheritdoc
     */
    public function setOrganization(\Volleyball\Bundle\OrganizationBundle\Entity\Organization $organization)
    {
        $this->organization = $organization;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getCouncil()
    {
        return $this->council;
    }

    /**
     * @inheritdoc
     */
    public function setCouncil(\Volleyball\Bundle\OrganizationBundle\Entity\Council $council)
    {
        $this->council = $council;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * @inheritdoc
     */
    public function setRegion(\Volleyball\Bundle\OrganizationBundle\Entity\Region $region)
    {
        $this->region = $region;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function setFaculty(array $faculty)
    {
        if (! $faculty instanceof ArrayCollection) {
            $faculty = new ArrayCollection($faculty);
        }

        $this->faculty = $faculty;

        return $this;
    }

    /**
     * Has faculty
     *
     * @return boolean
     */
    public function hasFaculty()
    {
        return !$this->faculty->isEmpty();
    }

    /**
     * @inheritdoc
     */
    public function getFaculty($faculty = null)
    {
        if (null == $faculty) {
            return $this->faculty;
        }

        return $this->faculty->get($faculty);
    }

    /**
     * @inheritdoc
     */
    public function addFaculty(\Volleyball\Bundle\FacilityBundle\Entity\Faculty $faculty)
    {
        $this->faculty->add($faculty);

        return $this;
    }

    /**
     * Remove a faculty
     *
     * @param Faculty|String $faculty faculty
     *
     * @return self
     */
    public function removeFaculty($faculty)
    {
        $this->faculty->remove($faculty);

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getQuarters($quarters = null, $type = null)
    {
        if (null != $quarters) {
            return $this->quarters->get($quarters);
        }
        
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
     * @inheritdoc
     */
    public function setQuarters(\Volleyball\Bundle\FacilityBundle\Entity\Quarters $quarters = null)
    {
        $this->quarters = $quarters;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getDepartments()
    {
        return $this->departments;
    }

    /**
     * @inheritdoc
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
     *
     * @return boolean
     */
    public function hasDepartments()
    {
        return !$this->departments->isEmpty();
    }

    /**
     * @inheritdoc
     */
    public function getDepartment($department)
    {
        return $this->departments->get($department);
    }

    /**
     * @inheritdoc
     */
    public function addDepartment(Department $department)
    {
        $this->departments->add($department);

        return $this;
    }

    /**
     * Remove a department
     *
     * @param Department|String $department department
     *
     * @return self
     */
    public function removeDepartment($department)
    {
        $this->departments->remove($department);

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getSeasons()
    {
        return $this->seasons;
    }

    /**
     * @inheritdoc
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
     *
     * @return boolean
     */
    public function hasSeasons()
    {
        return !$this->seasons->isEmpty();
    }

    /**
     * @inheritdoc
     */
    public function getSeason($season)
    {
        return $this->seasons->get($season);
    }

    /**
     * @inheritdoc
     */
    public function addSeason(\Volleyball\Bundle\EnrollmentBundle\Entity\Season $season)
    {
        if (!in_array($season, $this->seasons)) {
            $this->seasons[] = $season;
        }

        return $this;
    }

    /**
     * Remove a season
     *
     * @param Season|String $season season
     *
     * @return self
     */
    public function removeSeason($season)
    {
        $this->seasons->remove($season);

        return $this;
    }

    /**
     * Construct
     */
    public function __construct()
    {
        $this->faculty = new ArrayCollection();
    }
}
