<?php

namespace Loevgaard\DandomainFoundationBundle\Model;

interface CategoryInterface
{
    /**
     * Get b2bGroupId
     *
     * @return string
     */
    public function getB2bGroupId();

    /**
     * Set b2bGroupId
     *
     * @param string $b2bGroupId
     *
     * @return CategoryInterface
     */
    public function setB2bGroupId($b2bGroupId);

    /**
     * Get createdDate
     *
     * @return \DateTime
     */
    public function getCreatedDate();

    /**
     * Set createdDate
     *
     * @param \DateTime $createdDate
     *
     * @return CategoryInterface
     */
    public function setCreatedDate($createdDate);

    /**
     * Get customInfoLayout
     *
     * @return integer
     */
    public function getCustomInfoLayout();

    /**
     * Set customInfoLayout
     *
     * @param integer $customInfoLayout
     *
     * @return CategoryInterface
     */
    public function setCustomInfoLayout($customInfoLayout);

    /**
     * Get customListLayout
     *
     * @return integer
     */
    public function getCustomListLayout();

    /**
     * Set customListLayout
     *
     * @param integer $customListLayout
     *
     * @return CategoryInterface
     */
    public function setCustomListLayout($customListLayout);

    /**
     * Get defaultParentId
     *
     * @return integer
     */
    public function getDefaultParentId();

    /**
     * Set defaultParentId
     *
     * @param integer $defaultParentId
     *
     * @return CategoryInterface
     */
    public function setDefaultParentId($defaultParentId);

    /**
     * Get editedDate
     *
     * @return \DateTime
     */
    public function getEditedDate();

    /**
     * Set editedDate
     *
     * @param \DateTime $editedDate
     *
     * @return CategoryInterface
     */
    public function setEditedDate($editedDate);

    /**
     * Get externalId
     *
     * @return integer
     */
    public function getExternalId();

    /**
     * Set externalId
     *
     * @param integer $externalId
     *
     * @return CategoryInterface
     */
    public function setExternalId($externalId);

    /**
     * Get id
     *
     * @return integer
     */
    public function getId();

    /**
     * Get infoLayout
     *
     * @return integer
     */
    public function getInfoLayout();

    /**
     * Set infoLayout
     *
     * @param integer $infoLayout
     *
     * @return CategoryInterface
     */
    public function setInfoLayout($infoLayout);

    /**
     * Get internalId
     *
     * @return integer
     */
    public function getInternalId();

    /**
     * Set internalId
     *
     * @param integer $internalId
     *
     * @return CategoryInterface
     */
    public function setInternalId($internalId);

    /**
     * Get listLayout
     *
     * @return integer
     */
    public function getListLayout();

    /**
     * Set listLayout
     *
     * @param integer $listLayout
     *
     * @return CategoryInterface
     */
    public function setListLayout($listLayout);

    /**
     * Get modified
     *
     * @return boolean
     */
    public function getModified();

    /**
     * Set modified
     *
     * @param boolean $modified
     *
     * @return CategoryInterface
     */
    public function setModified($modified);

    /**
     * Get parentIdList
     *
     * @return array
     */
    public function getParentIdList();

    /**
     * Set parentIdList
     *
     * @param array $parentIdList
     *
     * @return CategoryInterface
     */
    public function setParentIdList($parentIdList);

    /**
     * Get segmentIdList
     *
     * @return array
     */
    public function getSegmentIdList();

    /**
     * Set segmentIdList
     *
     * @param array $segmentIdList
     *
     * @return CategoryInterface
     */
    public function setSegmentIdList($segmentIdList);

    /**
     * Get textKeywords
     *
     * @return string
     */
    public function getTextKeywords();

    /**
     * Set textKeywords
     *
     * @param string $textKeywords
     *
     * @return CategoryInterface
     */
    public function setTextKeywords($textKeywords);

    /**
     * Get textCategoryNumber
     *
     * @return string
     */
    public function getTextCategoryNumber();

    /**
     * Set textCategoryNumber
     *
     * @param string $textCategoryNumber
     *
     * @return CategoryInterface
     */
    public function setTextCategoryNumber($textCategoryNumber);

    /**
     * Get textDescription
     *
     * @return string
     */
    public function getTextDescription();

    /**
     * Set textDescription
     *
     * @param string $textDescription
     *
     * @return CategoryInterface
     */
    public function setTextDescription($textDescription);

    /**
     * Get textExternalId
     *
     * @return integer
     */
    public function getTextExternalId();

    /**
     * Set textExternalId
     *
     * @param integer $textExternalId
     *
     * @return CategoryInterface
     */
    public function setTextExternalId($textExternalId);

    /**
     * Get textHidden
     *
     * @return boolean
     */
    public function getTextHidden();

    /**
     * Set textHidden
     *
     * @param boolean $textHidden
     *
     * @return CategoryInterface
     */
    public function setTextHidden($textHidden);

    /**
     * Get textHiddenMobile
     *
     * @return boolean
     */
    public function getTextHiddenMobile();

    /**
     * Set textHiddenMobile
     *
     * @param boolean $textHiddenMobile
     *
     * @return CategoryInterface
     */
    public function setTextHiddenMobile($textHiddenMobile);

    /**
     * Get textIcon
     *
     * @return string
     */
    public function getTextIcon();

    /**
     * Set textIcon
     *
     * @param string $textIcon
     *
     * @return CategoryInterface
     */
    public function setTextIcon($textIcon);

    /**
     * Get textImage
     *
     * @return string
     */
    public function getTextImage();

    /**
     * Set textImage
     *
     * @param string $textImage
     *
     * @return CategoryInterface
     */
    public function setTextImage($textImage);

    /**
     * Get textLink
     *
     * @return string
     */
    public function getTextLink();

    /**
     * Set textLink
     *
     * @param string $textLink
     *
     * @return CategoryInterface
     */
    public function setTextLink($textLink);

    /**
     * Get textMetaDescription
     *
     * @return string
     */
    public function getTextMetaDescription();

    /**
     * Set textMetaDescription
     *
     * @param string $textMetaDescription
     *
     * @return CategoryInterface
     */
    public function setTextMetaDescription($textMetaDescription);

    /**
     * Get textName
     *
     * @return string
     */
    public function getTextName();

    /**
     * Set textName
     *
     * @param string $textName
     *
     * @return CategoryInterface
     */
    public function setTextName($textName);

    /**
     * Get textSiteId
     *
     * @return integer
     */
    public function getTextSiteId();

    /**
     * Set textSiteId
     *
     * @param integer $textSiteId
     *
     * @return CategoryInterface
     */
    public function setTextSiteId($textSiteId);

    /**
     * Get textSortOrder
     *
     * @return integer
     */
    public function getTextSortOrder();

    /**
     * Set textSortOrder
     *
     * @param integer $textSortOrder
     *
     * @return CategoryInterface
     */
    public function setTextSortOrder($textSortOrder);

    /**
     * Get textString
     *
     * @return string
     */
    public function getTextString();

    /**
     * Set textString
     *
     * @param string $textString
     *
     * @return CategoryInterface
     */
    public function setTextString($textString);

    /**
     * Get textTitle
     *
     * @return string
     */
    public function getTextTitle();

    /**
     * Set textTitle
     *
     * @param string $textTitle
     *
     * @return CategoryInterface
     */
    public function setTextTitle($textTitle);

    /**
     * Get textUrlname
     *
     * @return string
     */
    public function getTextUrlname();

    /**
     * Set textUrlname
     *
     * @param string $textUrlname
     *
     * @return CategoryInterface
     */
    public function setTextUrlname($textUrlname);
}
