<?php

namespace Loevgaard\DandomainFoundationBundle\Model;

interface ProductTypeFormulaInterface
{
    /**
     * @return string
     */
    public function getExternalId();

    /**
     * @param string $externalId
     *
     * @return ProductTypeFormulaInterface
     */
    public function setExternalId($externalId);

    /**
     * @return string
     */
    public function getFormula();

    /**
     * @param string $formula
     *
     * @return ProductTypeFormulaInterface
     */
    public function setFormula($formula);

    /**
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
     * @return int
     */
    public function getProductTypeGroupId();

    /**
     * @param int $productTypeGroupId
     *
     * @return ProductTypeFormulaInterface
     */
    public function setProductTypeGroupId($productTypeGroupId);

    /**
     * @return int
     */
    public function getSiteId();

    /**
     * @param int $siteId
     *
     * @return ProductTypeFormulaInterface
     */
    public function setSiteId($siteId);
}
