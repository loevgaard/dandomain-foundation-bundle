<?php

namespace Loevgaard\DandomainFoundationBundle\Model;

interface ProductTypeVatInterface
{
    /**
     * Get country
     *
     * @return string
     */
    public function getCountry();

    /**
     * Set country
     *
     * @param string $country
     *
     * @return ProductTypeVatInterface
     */
    public function setCountry($country);

    /**
     * Get countryId
     *
     * @return string
     */
    public function getCountryId();

    /**
     * Set countryId
     *
     * @param string $countryId
     *
     * @return ProductTypeVatInterface
     */
    public function setCountryId($countryId);

    /**
     * Get id
     *
     * @return integer
     */
    public function getId();

    /**
     * Add productType
     *
     * @param ProductTypeInterface $productType
     *
     * @return ProductTypeVatInterface
     */
    public function addProductType(ProductTypeInterface $productType);

    /**
     * Get productTypes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProductTypes();

    /**
     * Remove productType
     *
     * @param ProductTypeInterface $productType
     *
     * @return ProductTypeVatInterface
     */
    public function removeProductType(ProductTypeInterface $productType);

    /**
     * Get siteId
     *
     * @return integer
     */
    public function getSiteId();

    /**
     * Set siteId
     *
     * @param integer $siteId
     *
     * @return ProductTypeVatInterface
     */
    public function setSiteId($siteId);

    /**
     * Get vatPct
     *
     * @return string
     */
    public function getVatPct();

    /**
     * Set vatPct
     *
     * @param string $vatPct
     *
     * @return ProductTypeVatInterface
     */
    public function setVatPct($vatPct);
}
