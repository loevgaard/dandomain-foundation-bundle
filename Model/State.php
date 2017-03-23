<?php

namespace Loevgaard\DandomainFoundationBundle\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\MappedSuperclass
 */
class State implements StateInterface
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var bool
     *
     * @ORM\Column(type="boolean", name="`default`")
     */
    protected $default;

    /**
     * @var bool
     *
     * @ORM\Column(type="boolean")
     */
    protected $exclStatistics;

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     */
    protected $externalId;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    protected $name;

    /**
     * Get default
     *
     * @return boolean
     */
    public function getDefault()
    {
        return $this->default;
    }

    /**
     * Set default
     *
     * @param boolean $default
     *
     * @return State
     */
    public function setDefault($default)
    {
        $this->default = $default;

        return $this;
    }

    /**
     * Get exclStatistics
     *
     * @return boolean
     */
    public function getExclStatistics()
    {
        return $this->exclStatistics;
    }

    /**
     * Set exclStatistics
     *
     * @param boolean $exclStatistics
     *
     * @return State
     */
    public function setExclStatistics($exclStatistics)
    {
        $this->exclStatistics = $exclStatistics;

        return $this;
    }

    /**
     * Get externalId
     *
     * @return integer
     */
    public function getExternalId()
    {
        return $this->externalId;
    }

    /**
     * Set externalId
     *
     * @param integer $externalId
     *
     * @return State
     */
    public function setExternalId($externalId)
    {
        $this->externalId = $externalId;

        return $this;
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
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return State
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
}
