<?php

namespace Loevgaard\DandomainFoundationBundle\Model;

interface ProductTypeVatInterface
{
    /**
     * @return string
     */
    public function getCountry();

    /**
     * @param string $country
     *
     * @return ProductTypeVatInterface
     */
    public function setCountry($country);

    /**
     * @return string
     */
    public function getCountryId();

    /**
     * @param string $countryId
     *
     * @return ProductTypeVatInterface
     */
    public function setCountryId($countryId);

    /**
     * @return int
     */
    public function getId();

    /**
     * Add productType.
     *
     * @param ProductTypeInterface $productType
     *
     * @return ProductTypeVatInterface
     */
    public function addProductType(ProductTypeInterface $productType);

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProductTypes();

    /**
     * Remove productType.
     *
     * @param ProductTypeInterface $productType
     *
     * @return ProductTypeVatInterface
     */
    public function removeProductType(ProductTypeInterface $productType);

    /**
     * @return int
     */
    public function getSiteId();

    /**
     * @param int $siteId
     *
     * @return ProductTypeVatInterface
     */
    public function setSiteId($siteId);

    /**
     * @return string
     */
    public function getVatPct();

    /**
     * @param string $vatPct
     *
     * @return ProductTypeVatInterface
     */
    public function setVatPct($vatPct);
}
