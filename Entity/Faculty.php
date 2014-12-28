<?php
namespace Volleyball\Bundle\FacilityBundle\Entity;

use \Doctrine\ORM\Mapping as ORM;
use \Gedmo\Mapping\Annotation as Gedmo;
use \Symfony\Component\Validator\Constraints as Assert;
use \PUGX\MultiUserBundle\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity
 * @ORM\Table(name="faculty")
 * @UniqueEntity(
 *  fields = "username",
 *  targetClass = "Volleyball\Bundle\UserBundle\Entity\User",
 *  message="fos_user.username_already"
 * )
 * @UniqueEntity(
 *  fields = "email",
 *  targetClass = "Volleyball\Bundle\UserBundle\Entity\User",
 *  message="fos_user.email_already"
 * )
 */
class Faculty extends \Volleyball\Bundle\UserBundle\Entity\User
{
    /**
     * @var integer $id
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
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
     * @ORM\Column(type="string")
     * @Assert\NotBlank(message="Please enter your first name.", groups={"Registration", "Profile"})
     * @Assert\Length(
     *     min="3",
     *     minMessage="The name is too short.",
     *     groups={"Registration", "Profile"},
     *     max="255",
     *     maxMessage="The name is too long."
     *)
     */
    protected $firstName;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank(message="Please enter your last name.", groups={"Registration", "Profile"})
     * @Assert\Length(
     *     min="3",
     *     minMessage="The name is too short.",
     *     groups={"Registration", "Profile"},
     *     max="255",
     *     maxMessage="The name is too long."
     *)
     */
    protected $lastName;

    /**
     * @ORM\Column(type="string")
     * @Assert\Length(
     *      min = "1",
     *      max = "1",
     *      minMessage = "Must be at least {{ limit }} characters length",
     *      maxMessage = "Cannot be longer than {{ limit }} characters length"
     * )
     * @Assert\NotBlank()
     * @Assert\Choice(choices = {"M", "F"})
     */
    protected $gender;
   
    /**
     * @ORM\Column(type="date")
     * @Assert\NotBlank()
     */
    protected $birthdate;

    /**
     * @ORM\ManyToOne(targetEntity="Volleyball\Bundle\EnrollmentBundle\Entity\PasselEnrollment", inversedBy="user")
     * @ORM\JoinColumn(name="activeEnrollment_id", referencedColumnName="id", nullable=true)
     */
    protected $activeEnrollment;

    /**
     * @var string
     *
     * @ORM\Column(name="facebookId", type="string", length=255, nullable=true)
     */
    protected $facebookId;

    /**
     * @var string
     *
     * @ORM\Column(name="googleId", type="string", length=255, nullable=true)
     */
    protected $googleId;

    /**
     * @var string
     *
     * @ORM\Column(name="linkedinId", type="string", length=255, nullable=true)
     */
    protected $linkedinId;

    /**
     * @var string
     *
     * @ORM\Column(name="twitterId", type="string", length=255, nullable=true)
     */
    protected $twitterId;

    /**
     * @var string
     *
     * @ORM\Column(name="foursquareId", type="string", length=255, nullable=true)
     */
    protected $foursquareId;

    /**
     * @var string
     *
     * @ORM\Column(name="avatar", type="string", length=255)
     */
    protected $avatar = '/bundles/volleyballresource/images/avatars/default.png';

    /**
    * @Gedmo\Slug(fields={"lastName", "firstName"})
    * @ORM\Column(length=128, unique=true)
    */
    protected $slug;

    /**
     * Get slug
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set slug
     */
    public function setSlug($slug = null)
    {
        if (null == $slug) {
            $this->slug = str_replace(
                ' ',
                '-',
                $this->getName()
            );
        }

        return $this;
    }

    public function getName()
    {
        return $this->firstName.' '.$this->lastName;
    }

    /**
     * Get the full name of the user (first + last name)
     * @return string
     */
    public function getFullName()
    {
        return $this->getFirstName() . ' ' . $this->getLastname();
    }

    /**
     * Set activeEnrollment
     *
     * @param  Volleyball\Bundle\EnrollmentBundle\Entity\PasselEnrollment $activeEnrollment
     * @return User
     */
    public function setActiveEnrollment(\Volleyball\Bundle\EnrollmentBundle\Entity\ActiveEnrollment $activeEnrollment = null)
    {
        $this->activeEnrollment = $activeEnrollment;

        return $this;
    }

    /**
     * Get activeEnrollment
     *
     * @return Volleyball\Bundle\EnrollmentBundle\Entity\PasselEnrollment
     */
    public function getActiveEnrollment()
    {
        return $this->activeEnrollment;
    }

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
    public function getQuarters()
    {
        return $this->quarters;
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
