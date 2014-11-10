<?php
namespace Volleyball\Bundle\FacilityBundle\Entity;

use \Doctrine\ORM\Mapping as ORM;
use \Gedmo\Mapping\Annotation as Gedmo;
use \Symfony\Component\Validator\Constraints as Assert;

use \Volleyball\Bundle\UtilityBundle\Traits\SluggableTrait;
use \Volleyball\Bundle\UtilityBundle\Traits\TimestampableTrait;

/**
 * @ORM\Entity
 * @ORM\Table(name="quarters")
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="kind", type="string")
 * @ORM\DiscriminatorMap(
 *      {
 *          "attendee_quarters" = "\Volleyball\Bundle\FacilityBundle\Entity\AttendeeQuarters",
 *          "faculty_quarters" = "\Volleyball\Bundle\FacilityBundle\Entity\FacultyQuarters",
 *          "passel_quarters" = "\Volleyball\Bundle\FacilityBundle\Entity\PasselQuarters",
 *          "quarters"  = "\Volleyball\Bundle\FacilityBundle\Entity\Quarters"
 *      }
 * )
 */
class Quarters implements \Volleyball\Component\Facility\Interfaces\QuartersInterface
{
    use SluggableTrait;
    use TimestampableTrait;

    /**
     * Types of quarters available
     * @var array
     */
    private $types = array();
    
    /**
    * @ORM\Id
    * @ORM\Column(type="integer")
    * @ORM\GeneratedValue(strategy="AUTO")
    */
    protected $id;
    
    /**
    * @ORM\Column(type="string", length=150)
    * @var type
    */
    protected $name;
    
    /**
    * @ORM\Column(type="string", length=150)
    * @var type
    */
    protected $description;
    
    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $type;
    
    /**
     * @ORM\Column(type="integer")
     */
    protected $capacity;
    
    /**
     * @ORM\ManyToOne(targetEntity="Facility", inversedBy="quarters")
     * @ORM\JoinColumn(name="facility_id", referencedColumnName="id")
     */
    protected $facility;

    /**
     * Construct
     */
    public function __construct()
    {
        $this->types = array('passel', 'faculty', 'attendee');
    }
    
    /**
     * Get types
     * @return array
     */
    public static function getTypes()
    {
        return $this->types;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @inheritdoc
     */
    public function setType($type)
    {
        if (!in_array($type, $this->types)) {
            return false;
        }

        $this->type = $type;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @inheritdoc
     */
    public function setCapacity($capacity)
    {
        $this->capacity = $capacity;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getCapacity()
    {
        return $this->capacity;
    }

    /**
     * @inheritdoc
     */
    public function setFacility(\Volleyball\Bundle\FacilityBundle\Entity\Facility $facility)
    {
        $this->facility = $facility;

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
    public function getDescription()
    {
        return $this->description;
    }
    
    /**
     * @inheritdoc
     */
    public function setDescription($description)
    {
        $this->description = $description;
        
        return $this;
    }
}
