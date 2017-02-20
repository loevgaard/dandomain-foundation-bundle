<?php
namespace Loevgaard\DandomainFoundation\Model;

use Doctrine\ORM\Mapping as ORM;

trait StateTrait {
    /**
     * @var int
     * @ORM\Column(type="integer")
     */
    protected $externalId;

    /**
     * @var boolean
     * @ORM\Column(type="boolean")
     */
    protected $exclStatistics;

    /**
     * @var boolean
     * @ORM\Column(type="boolean", name="`default`")
     */
    protected $default;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    protected $name;

    /**
     * @return int
     */
    public function getExternalId()
    {
        return $this->externalId;
    }

    /**
     * @param int $externalId
     * @return StateTrait
     */
    public function setExternalId($externalId)
    {
        $this->externalId = $externalId;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isExclStatistics()
    {
        return $this->exclStatistics;
    }

    /**
     * @param boolean $exclStatistics
     * @return StateTrait
     */
    public function setExclStatistics($exclStatistics)
    {
        $this->exclStatistics = $exclStatistics;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isDefault()
    {
        return $this->default;
    }

    /**
     * @param boolean $default
     * @return StateTrait
     */
    public function setDefault($default)
    {
        $this->default = $default;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return StateTrait
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
}