<?php

namespace Loevgaard\DandomainFoundationBundle\Model;

interface VariantInterface
{
    /**
     * Get externalId.
     *
     * @return int
     */
    public function getExternalId();

    /**
     * Set externalId.
     *
     * @param int $externalId
     *
     * @return VariantInterface
     */
    public function setExternalId($externalId);

    /**
     * Get id.
     *
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
     * Get products.
     *
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
     * Get sortOrder.
     *
     * @return int
     */
    public function getSortOrder();

    /**
     * Set sortOrder.
     *
     * @param int $sortOrder
     *
     * @return VariantInterface
     */
    public function setSortOrder($sortOrder);

    /**
     * Get text.
     *
     * @return string
     */
    public function getText();

    /**
     * Set text.
     *
     * @param string $text
     *
     * @return VariantInterface
     */
    public function setText($text);

    /**
     * Add variantGroup
     *
     * @param VariantGroupInterface $variantGroup
     *
     * @return VariantInterface
     */
    public function addVariantGroup(VariantGroupInterface $variantGroup);

    /**
     * Get variantGroups
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getVariantGroups();

    /**
     * Remove variantGroup
     *
     * @param VariantGroupInterface $variantGroup
     *
     * @return VariantInterface
     */
    public function removeVariantGroup(VariantGroupInterface $variantGroup);
}
