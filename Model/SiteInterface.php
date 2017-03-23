<?php

namespace Loevgaard\DandomainFoundationBundle\Model;

interface SiteInterface
{
    /**
     * Get countryId.
     *
     * @return int
     */
    public function getCountryId();

    /**
     * Set countryId.
     *
     * @param int $countryId
     *
     * @return SiteInterface
     */
    public function setCountryId($countryId);

    /**
     * Get currencyCode.
     *
     * @return string
     */
    public function getCurrencyCode();

    /**
     * Set currencyCode.
     *
     * @param string $currencyCode
     *
     * @return SiteInterface
     */
    public function setCurrencyCode($currencyCode);

    /**
     * Get externalId.
     *
     * @return int
     */
    public function getExternalId();

    /**
     * Set externalId.
     *
     * @param int $externalId
     *
     * @return SiteInterface
     */
    public function setExternalId($externalId);

    /**
     * Get id.
     *
     * @return int
     */
    public function getId();

    /**
     * Get name.
     *
     * @return string
     */
    public function getName();

    /**
     * Set name.
     *
     * @param string $name
     *
     * @return SiteInterface
     */
    public function setName($name);
}
