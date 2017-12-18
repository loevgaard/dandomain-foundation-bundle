<?php

namespace Loevgaard\DandomainFoundationBundle\Model;

interface ProductRelationInterface
{
    /**
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
     * @return string
     */
    public function getProductNumber();

    /**
     * @param string $productNumber
     *
     * @return ProductRelationInterface
     */
    public function setProductNumber($productNumber);

    /**
     * @return int
     */
    public function getRelatedType();

    /**
     * @param int $relatedType
     *
     * @return ProductRelationInterface
     */
    public function setRelatedType($relatedType);

    /**
     * @return int
     */
    public function getSortOrder();

    /**
     * @param int $sortOrder
     *
     * @return ProductRelationInterface
     */
    public function setSortOrder($sortOrder);
}
