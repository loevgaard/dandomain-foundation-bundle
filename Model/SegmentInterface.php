<?php

namespace Loevgaard\DandomainFoundationBundle\Model;

interface SegmentInterface
{
    /**
     * Get externalId
     *
     * @return string
     */
    public function getExternalId();

    /**
     * Set externalId
     *
     * @param string $externalId
     *
     * @return SegmentInterface
     */
    public function setExternalId($externalId);

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
     * @return SegmentInterface
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
     * @return SegmentInterface
     */
    public function removeProduct(ProductInterface $product);

    /**
     * Get segmentOptions
     *
     * @return array
     */
    public function getSegmentOptions();

    /**
     * Set segmentOptions
     *
     * @param array $segmentOptions
     *
     * @return SegmentInterface
     */
    public function setSegmentOptions($segmentOptions);
}
