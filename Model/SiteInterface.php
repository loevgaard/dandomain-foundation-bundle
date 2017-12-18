<?php

namespace Loevgaard\DandomainFoundationBundle\Model;

interface SiteInterface
{
    /**
     * @return int
     */
    public function getCountryId();

    /**
     * @param int $countryId
     *
     * @return SiteInterface
     */
    public function setCountryId($countryId);

    /**
     * @return string
     */
    public function getCurrencyCode();

    /**
     * @param string $currencyCode
     *
     * @return SiteInterface
     */
    public function setCurrencyCode($currencyCode);

    /**
     * @return int
     */
    public function getExternalId();

    /**
     * @param int $externalId
     *
     * @return SiteInterface
     */
    public function setExternalId($externalId);

    /**
     * @return int
     */
    public function getId();

    /**
     * @return string
     */
    public function getName();

    /**
     * @param string $name
     *
     * @return SiteInterface
     */
    public function setName($name);
}
