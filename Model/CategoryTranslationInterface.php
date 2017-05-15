<?php

namespace Loevgaard\DandomainFoundationBundle\Model;

interface CategoryTranslationInterface
{
    /**
     * Get keywords.
     *
     * @return string
     */
    public function getKeywords();

    /**
     * Set keywords.
     *
     * @param string $keywords
     *
     * @return CategoryTranslationInterface
     */
    public function setKeywords($keywords);

    /**
     * Get categoryNumber.
     *
     * @return string
     */
    public function getCategoryNumber();

    /**
     * Set categoryNumber.
     *
     * @param string $categoryNumber
     *
     * @return CategoryTranslationInterface
     */
    public function setCategoryNumber($categoryNumber);

    /**
     * Get description.
     *
     * @return string
     */
    public function getDescription();

    /**
     * Set description.
     *
     * @param string $description
     *
     * @return CategoryTranslationInterface
     */
    public function setDescription($description);

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
     * @return CategoryTranslationInterface
     */
    public function setExternalId($externalId);

    /**
     * Get hidden.
     *
     * @return bool
     */
    public function getHidden();

    /**
     * Set hidden.
     *
     * @param bool $hidden
     *
     * @return CategoryTranslationInterface
     */
    public function setHidden($hidden);

    /**
     * Get hiddenMobile.
     *
     * @return bool
     */
    public function getHiddenMobile();

    /**
     * Set hiddenMobile.
     *
     * @param bool $hiddenMobile
     *
     * @return CategoryTranslationInterface
     */
    public function setHiddenMobile($hiddenMobile);

    /**
     * Get icon.
     *
     * @return string
     */
    public function getIcon();

    /**
     * Set icon.
     *
     * @param string $icon
     *
     * @return CategoryTranslationInterface
     */
    public function setIcon($icon);

    /**
     * Get image.
     *
     * @return string
     */
    public function getImage();

    /**
     * Set image.
     *
     * @param string $image
     *
     * @return CategoryTranslationInterface
     */
    public function setImage($image);

    /**
     * Get link.
     *
     * @return string
     */
    public function getLink();

    /**
     * Set link.
     *
     * @param string $link
     *
     * @return CategoryTranslationInterface
     */
    public function setLink($link);

    /**
     * Get metaDescription.
     *
     * @return string
     */
    public function getMetaDescription();

    /**
     * Set metaDescription.
     *
     * @param string $metaDescription
     *
     * @return CategoryTranslationInterface
     */
    public function setMetaDescription($metaDescription);

    /**
     * Get name.
     *
     * @return string
     */
    public function getName();

    /**
     * Set name.
     *
     * @param string $name
     *
     * @return CategoryTranslationInterface
     */
    public function setName($name);

    /**
     * Get siteId.
     *
     * @return int
     */
    public function getSiteId();

    /**
     * Set siteId.
     *
     * @param int $siteId
     *
     * @return CategoryTranslationInterface
     */
    public function setSiteId($siteId);

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
     * @return CategoryTranslationInterface
     */
    public function setSortOrder($sortOrder);

    /**
     * Get string.
     *
     * @return string
     */
    public function getString();

    /**
     * Set string.
     *
     * @param string $string
     *
     * @return CategoryTranslationInterface
     */
    public function setString($string);

    /**
     * Get title.
     *
     * @return string
     */
    public function getTitle();

    /**
     * Set title.
     *
     * @param string $title
     *
     * @return CategoryTranslationInterface
     */
    public function setTitle($title);

    /**
     * Get urlname.
     *
     * @return string
     */
    public function getUrlname();

    /**
     * Set urlname.
     *
     * @param string $urlname
     *
     * @return CategoryTranslationInterface
     */
    public function setUrlname($urlname);
}
