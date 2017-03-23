<?php

namespace Loevgaard\DandomainFoundationBundle\Model;

interface SiteInterface
{
    /**
     * Get countryId
     *
     * @return integer
     */
    public function getCountryId();

    /**
     * Set countryId
     *
     * @param integer $countryId
     *
     * @return SiteInterface
     */
    public function setCountryId($countryId);

    /**
     * Get currencyCode
     *
     * @return string
     */
    public function getCurrencyCode();

    /**
     * Set currencyCode
     *
     * @param string $currencyCode
     *
     * @return SiteInterface
     */
    public function setCurrencyCode($currencyCode);

    /**
     * Get externalId
     *
     * @return integer
     */
    public function getExternalId();

    /**
     * Set externalId
     *
     * @param integer $externalId
     *
     * @return SiteInterface
     */
    public function setExternalId($externalId);

    /**
     * Get id
     *
     * @return integer
     */
    public function getId();

    /**
     * Get name
     *
     * @return string
     */
    public function getName();

    /**
     * Set name
     *
     * @param string $name
     *
     * @return SiteInterface
     */
    public function setName($name);
}
