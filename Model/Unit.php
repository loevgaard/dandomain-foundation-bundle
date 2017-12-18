<?php

namespace Loevgaard\DandomainFoundationBundle\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\MappedSuperclass
 */
abstract class Unit implements UnitInterface
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
     * @var string
     *
     * @ORM\Column(nullable=true, type="text")
     */
    protected $text;

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
    public function getText()
    {
        return $this->text;
    }

    /**
     * {@inheritdoc}
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }
}
