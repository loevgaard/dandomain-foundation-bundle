<?php

namespace Loevgaard\DandomainFoundationBundle\Model;

interface MediaInterface
{
    /**
     * @return int
     */
    public function getExternalId();

    /**
     * @param int $externalId
     *
     * @return MediaInterface
     */
    public function setExternalId($externalId);

    /**
     * @return string
     */
    public function getHeight();

    /**
     * @param string $height
     *
     * @return MediaInterface
     */
    public function setHeight($height);

    /**
     * @return int
     */
    public function getId();

    /**
     * @return array
     */
    public function getMediaTranslations();

    /**
     * @param array $mediaTranslations
     *
     * @return MediaInterface
     */
    public function setMediaTranslations($mediaTranslations);

    /**
     * Add product.
     *
     * @param ProductInterface $product
     *
     * @return MediaInterface
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
     * @return MediaInterface
     */
    public function removeProduct(ProductInterface $product);

    /**
     * @return int
     */
    public function getSortorder();

    /**
     * @param int $sortorder
     *
     * @return MediaInterface
     */
    public function setSortorder($sortorder);

    /**
     * @return string
     */
    public function getThumbnail();

    /**
     * @param string $thumbnail
     *
     * @return MediaInterface
     */
    public function setThumbnail($thumbnail);

    /**
     * @return string
     */
    public function getThumbnailheight();

    /**
     * @param string $thumbnailheight
     *
     * @return MediaInterface
     */
    public function setThumbnailheight($thumbnailheight);

    /**
     * @return string
     */
    public function getThumbnailwidth();

    /**
     * @param string $thumbnailwidth
     *
     * @return MediaInterface
     */
    public function setThumbnailwidth($thumbnailwidth);

    /**
     * @return string
     */
    public function getUrl();

    /**
     * @param string $url
     *
     * @return MediaInterface
     */
    public function setUrl($url);

    /**
     * @return string
     */
    public function getWidth();

    /**
     * @param string $width
     *
     * @return MediaInterface
     */
    public function setWidth($width);
}
