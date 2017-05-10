<?php

namespace Loevgaard\DandomainFoundationBundle\Model;

interface ProductTypeFormulaInterface
{
    /**
     * Get externalId.
     *
     * @return string
     */
    public function getExternalId();

    /**
     * Set externalId.
     *
     * @param string $externalId
     *
     * @return ProductTypeFormulaInterface
     */
    public function setExternalId($externalId);

    /**
     * Get formula.
     *
     * @return string
     */
    public function getFormula();

    /**
     * Set formula.
     *
     * @param string $formula
     *
     * @return ProductTypeFormulaInterface
     */
    public function setFormula($formula);

    /**
     * Get id.
     *
     * @return int
     */
    public function getId();

    /**
     * Add productType.
     *
     * @param ProductTypeInterface $productType
     *
     * @return ProductTypeFormulaInterface
     */
    public function addProductType(ProductTypeInterface $productType);

    /**
     * Get productTypes.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProductTypes();

    /**
     * Remove productType.
     *
     * @param ProductTypeInterface $productType
     *
     * @return ProductTypeFormulaInterface
     */
    public function removeProductType(ProductTypeInterface $productType);

    /**
     * Get productTypeGroupId.
     *
     * @return int
     */
    public function getProductTypeGroupId();

    /**
     * Set productTypeGroupId.
     *
     * @param int $productTypeGroupId
     *
     * @return ProductTypeFormulaInterface
     */
    public function setProductTypeGroupId($productTypeGroupId);

    /**
     * Get siteId.
     *
     * @return int
     */
    public function getSiteId();

    /**
     * Set siteId.
     *
     * @param int $siteId
     *
     * @return ProductTypeFormulaInterface
     */
    public function setSiteId($siteId);
}
