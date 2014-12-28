<?php
namespace Volleyball\Bundle\FacilityBundle\Entity;

use \Doctrine\ORM\Mapping as ORM;
use \Gedmo\Mapping\Annotation as Gedmo;
use \Symfony\Component\Validator\Constraints as Assert;
use \Doctrine\Common\Collections\ArrayCollection;

use \Volleyball\Bundle\UtilityBundle\Traits\SluggableTrait;
use \Volleyball\Bundle\UtilityBundle\Traits\TimestampableTrait;

/**
 * @ORM\Table(name="facility_position")
 * @ORM\Entity(repositoryClass="Volleyball\Bundle\FacilityBundle\Repository\PositionRepository")
 */
class Position
{
    use SluggableTrait;
    use TimestampableTrait;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
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
     * Description
     * @var string
     * @ORM\Column(name="description", type="string")
     */
    protected $description = '';
    
    /**
     * @ORM\ManyToOne(targetEntity="Volleyball\Bundle\FacilityBundle\Entity\Facility", inversedBy="facility_positionspositions")
     * @ORM\JoinColumn(name="facility_id", referencedColumnName="id")
     */
    protected $facility = '';
    
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
    public function setFacility(\Volleyball\Bundle\FacilityBundle\Entity\Facility $facility)
    {
        $this->facility = $facility;

        return $this;
    }
}
