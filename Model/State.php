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
     * {@inheritdoc}
     */
    public function getDefault()
    {
        return $this->default;
    }

    /**
     * {@inheritdoc}
     */
    public function setDefault($default)
    {
        $this->default = $default;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getExclStatistics()
    {
        return $this->exclStatistics;
    }

    /**
     * {@inheritdoc}
     */
    public function setExclStatistics($exclStatistics)
    {
        $this->exclStatistics = $exclStatistics;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getExternalId()
    {
        return $this->externalId;
    }

    /**
     * {@inheritdoc}
     */
    public function setExternalId($externalId)
    {
        $this->externalId = $externalId;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * {@inheritdoc}
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
}
