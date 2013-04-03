<?php

namespace iMobile\Bundle\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 */
class UserConfig
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $dateFormat;

    /**
     * @ORM\OneToOne(targetEntity="User", inversedBy="userConfig")
     */
    protected $user;

    public function __construct()
    {
        $this->dateFormat = 'dd/MM/yyyy';
    }

    /**
     * Get User date format
     *
     * @return String
     */
    public function getDateFormat()
    {
        return $this->dateFormat;
    }

    /**
     * Set User date format
     *
     * @params String $dateFormat
     */
    public function setDateFormat($dateFormat)
    {
        $this->dateFormat = $dateFormat;
    }

    /**
     * Cast to string
     * @return string
     */
    public function __toString()
    {
        return "{$this->id}";
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
     * Get user
     *
     * @return User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set User
     *
     * @params User $user
     */
    public function setUser(User $user)
    {
        $this->user = $user;
    }
}