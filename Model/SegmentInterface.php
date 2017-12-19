<?php

namespace Loevgaard\DandomainFoundationBundle\Model;

interface SegmentInterface
{
    /**
     * Add category.
     *
     * @param CategoryInterface $category
     *
     * @return Segment
     */
    public function addCategory(CategoryInterface $category);

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCategories();

    /**
     * Remove category.
     *
     * @param CategoryInterface $category
     *
     * @return Segment
     */
    public function removeCategory(CategoryInterface $category);

    /**
     * @return string
     */
    public function getExternalId();

    /**
     * @param string $externalId
     *
     * @return SegmentInterface
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
     * @return SegmentInterface
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
     * @return SegmentInterface
     */
    public function removeProduct(ProductInterface $product);

    /**
     * @return array
     */
    public function getSegmentOptions();

    /**
     * @param array $segmentOptions
     *
     * @return SegmentInterface
     */
    public function setSegmentOptions($segmentOptions);
}
