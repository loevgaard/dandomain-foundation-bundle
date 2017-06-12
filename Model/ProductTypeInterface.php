<?php

namespace Loevgaard\DandomainFoundationBundle\Model;

interface ProductTypeInterface
{
    /**
     * @return string
     */
    public function getExternalId();

    /**
     * @param string $externalId
     *
     * @return ProductTypeInterface
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
     * @return ProductTypeInterface
     */
    public function setName($name);

    /**
     * Add productTypeField.
     *
     * @param ProductTypeFieldInterface $productTypeField
     *
     * @return ProductTypeInterface
     */
    public function addProductTypeField(ProductTypeFieldInterface $productTypeField);

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProductTypeFields();

    /**
     * Remove productTypeField.
     *
     * @param ProductTypeFieldInterface $productTypeField
     *
     * @return ProductTypeInterface
     */
    public function removeProductTypeField(ProductTypeFieldInterface $productTypeField);

    /**
     * Add productTypeFormula.
     *
     * @param ProductTypeFormulaInterface $productTypeFormula
     *
     * @return ProductTypeInterface
     */
    public function addProductTypeFormula(ProductTypeFormulaInterface $productTypeFormula);

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProductTypeFormulas();

    /**
     * Remove productTypeFormula.
     *
     * @param ProductTypeFormulaInterface $productTypeFormula
     *
     * @return ProductTypeInterface
     */
    public function removeProductTypeFormula(ProductTypeFormulaInterface $productTypeFormula);

    /**
     * Add productTypeVat.
     *
     * @param ProductTypeVatInterface $productTypeVat
     *
     * @return ProductTypeInterface
     */
    public function addProductTypeVat(ProductTypeVatInterface $productTypeVat);

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProductTypeVats();

    /**
     * Remove productTypeVat.
     *
     * @param ProductTypeVatInterface $productTypeVat
     *
     * @return ProductTypeInterface
     */
    public function removeProductTypeVat(ProductTypeVatInterface $productTypeVat);
}
