<?php

namespace iMobile\Bundle\DataBundle\Entity;

use Sonata\UserBundle\Entity\BaseUser as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user_user")
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 * @ORM\DiscriminatorMap({"user" = "User"})
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToOne(targetEntity="UserConfig", cascade={"persist", "remove"}, mappedBy="user")
     */
    protected $userConfig;

    protected $name;
    protected $username;
    protected $plainPassword;
    protected $email;

    public function __construct()
    {
        parent::__construct();
        $this->userConfig = new UserConfig();
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
     * Get User Type
     *
     * @return string
     */
    public function getUserType()
    {
        $retVal = 'Regular User';
        $roles = $this->getRoles();
        if (in_array('ROLE_ADMIN', $roles)) {
            $retVal = 'Administrator';
        }
        if (in_array('ROLE_SUPER_ADMIN', $roles)) {
            $retVal = 'Super Administrator';
        }
        return $retVal;
    }

    /**
     * Cast to string
     * @return string
     */
    public function __toString()
    {
        return "{$this->name} ({$this->username})";
    }

    /**
     * @ORM\ManyToMany(targetEntity="Group")
     * @ORM\JoinTable(joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="group_id", referencedColumnName="id")})
     *      
     */
    protected $groups;

    /**
     * Set name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * get userConfig
     * @return UserConfig
     */
    public function getUserConfig()
    {
        return $this->userConfig;
    }

    /**
     * set userConfig
     * @param UserConfig $userConfig
     */
    public function setUserConfig(UserConfig $userConfig)
    {
        $userConfig->setUser($this);
        $this->userConfig = $userConfig;
    }
}