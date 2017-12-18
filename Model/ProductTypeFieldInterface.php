<?php

namespace Loevgaard\DandomainFoundationBundle\Model;

interface ProductTypeFieldInterface
{
    /**
     * @return string
     */
    public function getExternalId();

    /**
     * @param string $externalId
     *
     * @return ProductTypeFieldInterface
     */
    public function setExternalId($externalId);

    /**
     * @return int
     */
    public function getId();

    /**
     * @return string
     */
    public function getLabel();

    /**
     * @param string $label
     *
     * @return ProductTypeFieldInterface
     */
    public function setLabel($label);

    /**
     * @return int
     */
    public function getLanguageId();

    /**
     * @param int $languageId
     *
     * @return ProductTypeFieldInterface
     */
    public function setLanguageId($languageId);

    /**
     * @return int
     */
    public function getNumber();

    /**
     * @param int $number
     *
     * @return ProductTypeFieldInterface
     */
    public function setNumber($number);

    /**
     * Add productType.
     *
     * @param ProductTypeInterface $productType
     *
     * @return ProductTypeFieldInterface
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
     * @return ProductTypeFieldInterface
     */
    public function removeProductType(ProductTypeInterface $productType);
}
