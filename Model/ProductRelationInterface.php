<?php

namespace Loevgaard\DandomainFoundationBundle\Model;

interface ProductRelationInterface
{
    /**
     * Get id
     *
     * @return integer
     */
    public function getId();

    /**
     * Add product
     *
     * @param ProductInterface $product
     *
     * @return ProductRelationInterface
     */
    public function addProduct(ProductInterface $product);

    /**
     * Get products
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProducts();

    /**
     * Remove product
     *
     * @param ProductInterface $product
     *
     * @return ProductRelationInterface
     */
    public function removeProduct(ProductInterface $product);

    /**
     * Get productNumber
     *
     * @return string
     */
    public function getProductNumber();

    /**
     * Set productNumber
     *
     * @param string $productNumber
     *
     * @return ProductRelationInterface
     */
    public function setProductNumber($productNumber);

    /**
     * Get relatedType
     *
     * @return integer
     */
    public function getRelatedType();

    /**
     * Set relatedType
     *
     * @param integer $relatedType
     *
     * @return ProductRelationInterface
     */
    public function setRelatedType($relatedType);

    /**
     * Get sortOrder
     *
     * @return integer
     */
    public function getSortOrder();

    /**
     * Set sortOrder
     *
     * @param integer $sortOrder
     *
     * @return ProductRelationInterface
     */
    public function setSortOrder($sortOrder);
}
