<?php

namespace Loevgaard\DandomainFoundationBundle\Model;

interface VariantGroupInterface
{
    /**
     * @return int
     */
    public function getExternalId();

    /**
     * @param int $externalId
     *
     * @return VariantGroupInterface
     */
    public function setExternalId($externalId);

    /**
     * @return string
     */
    public function getGroupName();

    /**
     * @param string $groupName
     *
     * @return VariantGroupInterface
     */
    public function setGroupName($groupName);

    /**
     * @return string
     */
    public function getHeadline();

    /**
     * @param string $headline
     *
     * @return VariantGroupInterface
     */
    public function setHeadline($headline);

    /**
     * @return int
     */
    public function getId();

    /**
     * Add product.
     *
     * @param ProductInterface $product
     *
     * @return VariantGroupInterface
     */
    public function addProduct(ProductInterface $product);

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProducts();

    /**
     * Remove product.
     *
     * @param ProductInterface $product
     *
     * @return VariantGroupInterface
     */
    public function removeProduct(ProductInterface $product);

    /**
     * @return string
     */
    public function getSelectText();

    /**
     * @param string $selectText
     *
     * @return VariantGroupInterface
     */
    public function setSelectText($selectText);

    /**
     * @return int
     */
    public function getSiteId();

    /**
     * @param int $siteId
     *
     * @return VariantGroupInterface
     */
    public function setSiteId($siteId);

    /**
     * @return int
     */
    public function getSortOrder();

    /**
     * @param int $sortOrder
     *
     * @return VariantGroupInterface
     */
    public function setSortOrder($sortOrder);

    /**
     * @return string
     */
    public function getText();

    /**
     * @param string $text
     *
     * @return VariantGroupInterface
     */
    public function setText($text);

    /**
     * Add variant.
     *
     * @param VariantInterface $variant
     *
     * @return VariantGroupInterface
     */
    public function addVariant(VariantInterface $variant);

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getVariants();

    /**
     * Remove variant.
     *
     * @param VariantInterface $variant
     *
     * @return VariantGroupInterface
     */
    public function removeVariant(VariantInterface $variant);

    /**
     * @return int
     */
    public function getVariantType();

    /**
     * @param int $variantType
     *
     * @return VariantGroupInterface
     */
    public function setVariantType($variantType);
}
