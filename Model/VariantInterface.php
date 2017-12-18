<?php

namespace Loevgaard\DandomainFoundationBundle\Model;

interface VariantInterface
{
    /**
     * Add disabledProduct.
     *
     * @param ProductInterface $disabledProduct
     *
     * @return VariantInterface
     */
    public function addDisabledProduct(ProductInterface $disabledProduct);

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDisabledProducts();

    /**
     * Remove disabledProduct.
     *
     * @param ProductInterface $disabledProduct
     *
     * @return VariantInterface
     */
    public function removeDisabledProduct(ProductInterface $disabledProduct);

    /**
     * @return int
     */
    public function getExternalId();

    /**
     * @param int $externalId
     *
     * @return VariantInterface
     */
    public function setExternalId($externalId);

    /**
     * @return int
     */
    public function getId();

    /**
     * Add product.
     *
     * @param ProductInterface $product
     *
     * @return VariantInterface
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
     * @return VariantInterface
     */
    public function removeProduct(ProductInterface $product);

    /**
     * @return int
     */
    public function getSortOrder();

    /**
     * @param int $sortOrder
     *
     * @return VariantInterface
     */
    public function setSortOrder($sortOrder);

    /**
     * @return string
     */
    public function getText();

    /**
     * @param string $text
     *
     * @return VariantInterface
     */
    public function setText($text);

    /**
     * Add variantGroup.
     *
     * @param VariantGroupInterface $variantGroup
     *
     * @return VariantInterface
     */
    public function addVariantGroup(VariantGroupInterface $variantGroup);

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getVariantGroups();

    /**
     * Remove variantGroup.
     *
     * @param VariantGroupInterface $variantGroup
     *
     * @return VariantInterface
     */
    public function removeVariantGroup(VariantGroupInterface $variantGroup);
}
