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
     * @var int
     *
     * @ORM\Column(type="integer", unique=true)
     */
    protected $externalId;

    /**
     * @var bool
     *
     * @ORM\Column(nullable=true, type="boolean")
     */
    protected $exclStatistics;

    /**
     * @var bool
     *
     * @ORM\Column(nullable=true, type="boolean")
     */
    protected $isDefault;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $name;

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
    public function getIsDefault()
    {
        return $this->isDefault;
    }

    /**
     * {@inheritdoc}
     */
    public function setIsDefault($isDefault)
    {
        $this->isDefault = $isDefault;

        return $this;
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
