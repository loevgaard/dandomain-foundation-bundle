<?php

namespace Loevgaard\DandomainFoundationBundle\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\MappedSuperclass
 */
abstract class Site implements SiteInterface
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
     * @var int
     *
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $countryId;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $currencyCode;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $name;

    /**
     * {@inheritdoc}
     */
    public function getCountryId()
    {
        return $this->countryId;
    }

    /**
     * {@inheritdoc}
     */
    public function setCountryId($countryId)
    {
        $this->countryId = $countryId;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getCurrencyCode()
    {
        return $this->currencyCode;
    }

    /**
     * {@inheritdoc}
     */
    public function setCurrencyCode($currencyCode)
    {
        $this->currencyCode = $currencyCode;

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
