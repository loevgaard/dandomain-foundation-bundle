<?php

namespace Loevgaard\DandomainFoundationBundle\Model;

interface MediaInterface
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
     * @return MediaInterface
     */
    public function setExternalId($externalId);

    /**
     * Get height.
     *
     * @return string
     */
    public function getHeight();

    /**
     * Set height.
     *
     * @param string $height
     *
     * @return MediaInterface
     */
    public function setHeight($height);

    /**
     * Get id.
     *
     * @return int
     */
    public function getId();

    /**
     * Get mediaTranslations.
     *
     * @return array
     */
    public function getMediaTranslations();

    /**
     * Set mediaTranslations.
     *
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
     * @return MediaInterface
     */
    public function removeProduct(ProductInterface $product);

    /**
     * Get sortorder.
     *
     * @return int
     */
    public function getSortorder();

    /**
     * Set sortorder.
     *
     * @param int $sortorder
     *
     * @return MediaInterface
     */
    public function setSortorder($sortorder);

    /**
     * Get thumbnail.
     *
     * @return string
     */
    public function getThumbnail();

    /**
     * Set thumbnail.
     *
     * @param string $thumbnail
     *
     * @return MediaInterface
     */
    public function setThumbnail($thumbnail);

    /**
     * Get thumbnailheight.
     *
     * @return string
     */
    public function getThumbnailheight();

    /**
     * Set thumbnailheight.
     *
     * @param string $thumbnailheight
     *
     * @return MediaInterface
     */
    public function setThumbnailheight($thumbnailheight);

    /**
     * Get thumbnailwidth.
     *
     * @return string
     */
    public function getThumbnailwidth();

    /**
     * Set thumbnailwidth.
     *
     * @param string $thumbnailwidth
     *
     * @return MediaInterface
     */
    public function setThumbnailwidth($thumbnailwidth);

    /**
     * Get url.
     *
     * @return string
     */
    public function getUrl();

    /**
     * Set url.
     *
     * @param string $url
     *
     * @return MediaInterface
     */
    public function setUrl($url);

    /**
     * Get width.
     *
     * @return string
     */
    public function getWidth();

    /**
     * Set width.
     *
     * @param string $width
     *
     * @return MediaInterface
     */
    public function setWidth($width);
}
