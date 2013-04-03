<?php

namespace iMobile\Bundle\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(uniqueConstraints={@ORM\UniqueConstraint(name="error_idx", columns={"errorCode"})})
 */
class UserError
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
    protected $component;

    /**
     * @ORM\Column(type="string")
     */
    protected $errorCode;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $user;

    /**
     * @ORM\Column(type="string")
     */
    protected $message;

    /**
     * @ORM\Column(type="string")
     */
    protected $exceptionType;

    /**
     * @ORM\Column(type="date")
     */
    protected $date;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $acknowledged = false;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $entity;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    protected $identifier;

    public function __construct()
    {
        $this->date = new \DateTime();
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
     * Set component
     *
     * @param string $component
     */
    public function setComponent($component)
    {
        $this->component = $component;
    }

    /**
     * Get component
     *
     * @return string 
     */
    public function getComponent()
    {
        return $this->component;
    }

    /**
     * Set errorCode
     *
     * @param string $errorCode
     */
    public function setErrorCode($errorCode)
    {
        $this->errorCode = $errorCode;
    }

    /**
     * Get errorCode
     *
     * @return string 
     */
    public function getErrorCode()
    {
        return $this->errorCode;
    }

    /**
     * Set user
     *
     * @param string $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * Get user
     *
     * @return string 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set message
     *
     * @param string $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * Get message
     *
     * @return string 
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set exceptionType
     *
     * @param string $exceptionType
     */
    public function setExceptionType($exceptionType)
    {
        $this->exceptionType = $exceptionType;
    }

    /**
     * Get exceptionType
     *
     * @return string 
     */
    public function getExceptionType()
    {
        return $this->exceptionType;
    }

    /**
     * Set date
     *
     * @param date $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * Get date
     *
     * @return date 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set acknowledged
     *
     * @param boolean $acknowledged
     */
    public function setAcknowledged($acknowledged)
    {
        $this->acknowledged = $acknowledged;
    }

    /**
     * Get acknowledged
     *
     * @return boolean 
     */
    public function getAcknowledged()
    {
        return $this->acknowledged;
    }

    /**
     * Set entity
     *
     * @param string $entity
     */
    public function setEntity($entity)
    {
        $this->entity = $entity;
    }

    /**
     * Get entity
     *
     * @return string 
     */
    public function getEntity()
    {
        return $this->entity;
    }

    /**
     * Set identifier
     *
     * @param array $identifier
     */
    public function setIdentifier($identifier)
    {
        $this->identifier = $identifier;
    }

    /**
     * Get identifier
     *
     * @return array 
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    public function getResolve()
    {
        $entity = $this->getEntity();
        $identifier = $this->getIdentifier();
        $resolve = null;

        if (!empty($entity) && !empty($identifier)) {
            $resolve = array(
                'entity' => $entity,
                'identifier' => $identifier
            );
        }
        
        return $resolve;
    }
}