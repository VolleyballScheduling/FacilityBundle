<?php
namespace Volleyball\Bundle\FacilityBundle\Entity;

use \Volleyball\Bundle\UtilityBundle\Traits\SluggableTrait;
use \Volleyball\Bundle\UtilityBundle\Traits\TimestampableTrait;

class Quarters
{
    use SluggableTrait;
    use TimestampableTrait;

    /**
     * Types of quarters available
     * @var array
     */
    private $types = array();
    
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
     * Description
     * @var string
     */
    protected $description;
    
    /**
     * Type
     * @var string
     */
    protected $type;
    
    /**
     * Capacity
     * @var integer
     */
    protected $capacity;
    
    /**
     * Facility
     * @var \Volleyball\Bundle\FacilityBundle\Entity\Facility
     */
    protected $facility;

    /**
     * Construct
     */
    public function __construct()
    {
        $this->types = array('attendee', 'faculty', 'leader', 'passel');
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
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     * @param string $name
     * @return \Volleyball\Bundle\FacilityBundle\Entity\Quarters
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
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
     * Set type
     * @param string $type
     * @return \Volleyball\Bundle\FacilityBundle\Entity\Quarters|boolean
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
     * Get type
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set capacity
     * @param integer $capacity
     * @return \Volleyball\Bundle\FacilityBundle\Entity\Quarters
     */
    public function setCapacity($capacity)
    {
        $this->capacity = $capacity;

        return $this;
    }

    /**
     * Get capacity
     * @return integer
     */
    public function getCapacity()
    {
        return $this->capacity;
    }

    /**
     * Set facility
     * @param \Volleyball\Bundle\FacilityBundle\Entity\Facility $facility
     * @return \Volleyball\Bundle\FacilityBundle\Entity\Quarters
     */
    public function setFacility(\Volleyball\Bundle\FacilityBundle\Entity\Facility $facility)
    {
        $this->facility = $facility;

        return $this;
    }

    /**
     * Get facility
     * @return type
     */
    public function getFacility()
    {
        return $this->facility;
    }
    
    /**
     * Get description
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
    
    /**
     * Set description
     * @param string $description
     * @return \Volleyball\Bundle\FacilityBundle\Entity\Quarters
     */
    public function setDescription($description)
    {
        $this->description = $description;
        
        return $this;
    }
}
