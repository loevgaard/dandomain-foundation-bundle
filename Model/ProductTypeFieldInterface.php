<?php

namespace Loevgaard\DandomainFoundationBundle\Model;

interface ProductTypeFieldInterface
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
     * @return ProductTypeFieldInterface
     */
    public function setExternalId($externalId);

    /**
     * Get id.
     *
     * @return int
     */
    public function getId();

    /**
     * Get label.
     *
     * @return string
     */
    public function getLabel();

    /**
     * Set label.
     *
     * @param string $label
     *
     * @return ProductTypeFieldInterface
     */
    public function setLabel($label);

    /**
     * Get languageId.
     *
     * @return int
     */
    public function getLanguageId();

    /**
     * Set languageId.
     *
     * @param int $languageId
     *
     * @return ProductTypeFieldInterface
     */
    public function setLanguageId($languageId);

    /**
     * Get number.
     *
     * @return int
     */
    public function getNumber();

    /**
     * Set number.
     *
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
     * @return ProductTypeFieldInterface
     */
    public function removeProductType(ProductTypeInterface $productType);
}
