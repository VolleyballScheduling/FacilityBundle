<?php
namespace Volleyball\Bundle\FacilityBundle\Entity;

use \Doctrine\Common\Collections\ArrayCollection;

use \Volleyball\Bundle\UtilityBundle\Traits\SluggableTrait;
use \Volleyball\Bundle\UtilityBundle\Traits\TimestampableTrait;

class Department
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
     * Description
     * @var string
     */
    protected $description;
    
    /**
     * Parent
     * @var \Volleyball\Bundle\Facility\Bundle\Entity\Department
     */
    protected $parent;
    
    /**
     * Children
     * @var array 
     */
    protected $children;
    
    /**
     *
     * @var \Volleyball\Bundle\FacilityBundle\Entity\Facility
     */
    protected $facility;
    
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
     * Get name
     * @param string $name
     * @return \Volleyball\Bundle\FacilityBundle\Entity\Department
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
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
     * @return \Volleyball\Bundle\FacilityBundle\Entity\Department
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get parent
     * @return \Volleyball\Bundle\FacilityBundle\Entity\Department
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Set parent
     * @param \Volleyball\Bundle\FacilityBundle\Entity\Department $parent
     * @return \Volleyball\Bundle\FacilityBundle\Entity\Department
     */
    public function setParent(\Volleyball\Bundle\FacilityBundle\Entity\Department $parent)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get facility
     * @return \Volleyball\Bundle\FacilityBUndle\Entity\Facility
     */
    public function getFacility()
    {
        return $this->facility;
    }

    /**
     * Set facility
     * @param \Volleyball\Bundle\FacilityBundle\Entity\Facility $facility
     * @return \Volleyball\Bundle\FacilityBundle\Entity\Department
     */
    public function setFacility(\Volleyball\Bundle\FacilityBundle\Entity\Facility $facility)
    {
        $this->facility = $facility;

        return $this;
    }
    
    /**
     * Get children
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getChildren()
    {
        return $this->children;
    }
    
    /**
     * Has children
     * @return boolean
     */
    public function hasChildren()
    {
        return !$this->children->isEmpty();
    }
    
    /**
     * Set children
     * @param array $children
     * @return \Volleyball\Bundle\FacilityBundle\Entity\Department
     */
    public function setChildren(array $children)
    {
        if (!$children instanceof ArrayCollection) {
            $children = new ArrayCollection($children);
        }
        
        $this->children = $children;
        
        return $this;
    }
    
    /**
     * Get child
     * @param string $child
     * @return \Volleyball\Bundle\FacilityBundle\Entity\Department
     */
    public function getChild($child)
    {
        return $this->children->get($child);
    }
    
    /**
     * Has child
     * @param string $child
     * @return boolean
     */
    public function hasChild($child)
    {
        return $this->children->contains($child);
    }
    
    /**
     * Add child
     * @param \Volleyball\Bundle\FacilityBundle\Entity\Department $child
     * @return \Volleyball\Bundle\FacilityBundle\Entity\Department
     */
    public function addChild(\Volleyball\Bundle\FacilityBundle\Entity\Department $child)
    {
        $this->children->add($child);
        
        return $this;
    }
    
    /**
     * Remove child
     * @param \VolleyballBundle\FacilityBundle\Entity\Department $child
     */
    public function removeChild(\VolleyballBundle\FacilityBundle\Entity\Department $child)
    {
        $this->children->remove($child);
    }
}
