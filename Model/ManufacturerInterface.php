<?php

namespace Loevgaard\DandomainFoundationBundle\Model;

interface ManufacturerInterface
{
    /**
     * @return string
     */
    public function getExternalId();

    /**
     * @param string $externalId
     *
     * @return ManufacturerInterface
     */
    public function setExternalId($externalId);

    /**
     * @return int
     */
    public function getId();

    /**
     * @return string
     */
    public function getLink();

    /**
     * @param string $link
     *
     * @return ManufacturerInterface
     */
    public function setLink($link);

    /**
     * @return string
     */
    public function getLinkText();

    /**
     * @param string $linkText
     *
     * @return ManufacturerInterface
     */
    public function setLinkText($linkText);

    /**
     * @return string
     */
    public function getName();

    /**
     * @param string $name
     *
     * @return ManufacturerInterface
     */
    public function setName($name);

    /**
     * Add product.
     *
     * @param ProductInterface $product
     *
     * @return ManufacturerInterface
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
     * @return ManufacturerInterface
     */
    public function removeProduct(ProductInterface $product);
}
