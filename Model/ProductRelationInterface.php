<?php

namespace Loevgaard\DandomainFoundationBundle\Model;

interface ProductRelationInterface
{
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
     * @return ProductRelationInterface
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
     * @return ProductRelationInterface
     */
    public function removeProduct(ProductInterface $product);

    /**
     * Get productNumber.
     *
     * @return string
     */
    public function getProductNumber();

    /**
     * Set productNumber.
     *
     * @param string $productNumber
     *
     * @return ProductRelationInterface
     */
    public function setProductNumber($productNumber);

    /**
     * Get relatedType.
     *
     * @return int
     */
    public function getRelatedType();

    /**
     * Set relatedType.
     *
     * @param int $relatedType
     *
     * @return ProductRelationInterface
     */
    public function setRelatedType($relatedType);

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
     * @return ProductRelationInterface
     */
    public function setSortOrder($sortOrder);
}
