<?php

namespace iMobile\Bundle\DataBundle\Document\Common;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\EmbeddedDocument
 */
class ExternalId
{
    /**
     * @MongoDB\String
     */
    protected $id;

    /**
     * @MongoDB\String
     */
    protected $value;

    /**
     * Set id
     *
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Get id
     *
     * @return string $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set value
     *
     * @param string $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * Get value
     *
     * @return string $value
     */
    public function getValue()
    {
        return $this->value;
    }
}
