<?php

namespace Loevgaard\DandomainFoundationBundle\Model;

interface CategoryTranslationInterface
{
    /**
     * @return string
     */
    public function getCategoryNumber();

    /**
     * @param string $categoryNumber
     *
     * @return CategoryTranslationInterface
     */
    public function setCategoryNumber($categoryNumber);

    /**
     * @return string
     */
    public function getDescription();

    /**
     * @param string $description
     *
     * @return CategoryTranslationInterface
     */
    public function setDescription($description);

    /**
     * @return int
     */
    public function getExternalId();

    /**
     * @param int $externalId
     *
     * @return CategoryTranslationInterface
     */
    public function setExternalId($externalId);

    /**
     * @return bool
     */
    public function getHidden();

    /**
     * @param bool $hidden
     *
     * @return CategoryTranslationInterface
     */
    public function setHidden($hidden);

    /**
     * @return bool
     */
    public function getHiddenMobile();

    /**
     * @param bool $hiddenMobile
     *
     * @return CategoryTranslationInterface
     */
    public function setHiddenMobile($hiddenMobile);

    /**
     * @return string
     */
    public function getIcon();

    /**
     * @param string $icon
     *
     * @return CategoryTranslationInterface
     */
    public function setIcon($icon);

    /**
     * @return string
     */
    public function getImage();

    /**
     * @param string $image
     *
     * @return CategoryTranslationInterface
     */
    public function setImage($image);

    /**
     * @return string
     */
    public function getKeywords();

    /**
     * @param string $keywords
     *
     * @return CategoryTranslationInterface
     */
    public function setKeywords($keywords);

    /**
     * @return string
     */
    public function getLink();

    /**
     * @param string $link
     *
     * @return CategoryTranslationInterface
     */
    public function setLink($link);

    /**
     * @return string
     */
    public function getMetaDescription();

    /**
     * @param string $metaDescription
     *
     * @return CategoryTranslationInterface
     */
    public function setMetaDescription($metaDescription);

    /**
     * @return string
     */
    public function getName();

    /**
     * @param string $name
     *
     * @return CategoryTranslationInterface
     */
    public function setName($name);

    /**
     * @return int
     */
    public function getSiteId();

    /**
     * @param int $siteId
     *
     * @return CategoryTranslationInterface
     */
    public function setSiteId($siteId);

    /**
     * @return int
     */
    public function getSortOrder();

    /**
     * @param int $sortOrder
     *
     * @return CategoryTranslationInterface
     */
    public function setSortOrder($sortOrder);

    /**
     * @return string
     */
    public function getString();

    /**
     * @param string $string
     *
     * @return CategoryTranslationInterface
     */
    public function setString($string);

    /**
     * @return string
     */
    public function getTitle();

    /**
     * @param string $title
     *
     * @return CategoryTranslationInterface
     */
    public function setTitle($title);

    /**
     * @return string
     */
    public function getUrlname();

    /**
     * @param string $urlname
     *
     * @return CategoryTranslationInterface
     */
    public function setUrlname($urlname);
}
