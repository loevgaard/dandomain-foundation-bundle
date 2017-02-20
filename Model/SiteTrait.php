<?php
namespace Loevgaard\DandomainFoundation\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

trait SiteTrait
{
    /**
     * @var int
     * @ORM\Column(type="integer")
     */
    protected $externalId;

    /**
     * @var int
     * @ORM\Column(type="integer")
     */
    protected $countryId;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    protected $currencyCode;

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
     * @return SiteTrait
     */
    public function setExternalId($externalId)
    {
        $this->externalId = $externalId;
        return $this;
    }

    /**
     * @return int
     */
    public function getCountryId()
    {
        return $this->countryId;
    }

    /**
     * @param int $countryId
     * @return SiteTrait
     */
    public function setCountryId($countryId)
    {
        $this->countryId = $countryId;
        return $this;
    }

    /**
     * @return string
     */
    public function getCurrencyCode()
    {
        return $this->currencyCode;
    }

    /**
     * @param string $currencyCode
     * @return SiteTrait
     */
    public function setCurrencyCode($currencyCode)
    {
        $this->currencyCode = $currencyCode;
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
     * @return SiteTrait
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
}